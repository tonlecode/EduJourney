import { useState, useEffect, useRef } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { Box, Container, Paper, TextField, IconButton, Typography, Avatar } from '@mui/material';
import axios from 'axios';

function Chat() {
  const { userId } = useParams();
  const navigate = useNavigate();
  const [messages, setMessages] = useState([]);
  const [newMessage, setNewMessage] = useState('');
  const [chatUser, setChatUser] = useState(null);
  const [error, setError] = useState('');
  const chatBoxRef = useRef(null);

  useEffect(() => {
    const fetchChatUser = async () => {
      try {
        const response = await axios.get(`/api/users/${userId}`);
        setChatUser(response.data);
      } catch (err) {
        setError('Failed to load user details');
      }
    };
    fetchChatUser();
  }, [userId]);

  useEffect(() => {
    const fetchMessages = async () => {
      try {
        const response = await axios.post('/api/get-chat', { incoming_id: userId });
        setMessages(response.data);
        scrollToBottom();
      } catch (err) {
        setError('Failed to load messages');
      }
    };

    fetchMessages();
    const interval = setInterval(fetchMessages, 500);
    return () => clearInterval(interval);
  }, [userId]);

  const scrollToBottom = () => {
    if (chatBoxRef.current) {
      chatBoxRef.current.scrollTop = chatBoxRef.current.scrollHeight;
    }
  };

  const handleSendMessage = async (e) => {
    e.preventDefault();
    if (!newMessage.trim()) return;

    try {
      await axios.post('/api/insert-chat', {
        incoming_id: userId,
        message: newMessage
      });
      setNewMessage('');
    } catch (err) {
      setError('Failed to send message');
    }
  };

  const handleImageUpload = async (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('incoming_id', userId);
    formData.append('send_image', file);

    try {
      await axios.post('/api/insert-chat', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }
      });
    } catch (err) {
      setError('Failed to upload image');
    }
  };

  return (
    <Container maxWidth="md">
      <Box sx={{ mt: 4, height: '80vh', display: 'flex', flexDirection: 'column' }}>
        <Paper elevation={3} sx={{ p: 2, mb: 2, display: 'flex', alignItems: 'center' }}>
          <IconButton onClick={() => navigate('/home')} sx={{ mr: 2 }}>
            <img src="/images/arrow.svg" alt="Back" style={{ width: 20 }} />
          </IconButton>
          {chatUser && (
            <>
              <Avatar src={`/uploaded_img/${chatUser.img}`} alt={chatUser.name} />
              <Box sx={{ ml: 2 }}>
                <Typography variant="h6">{chatUser.name}</Typography>
                <Typography variant="body2" color="textSecondary">
                  {chatUser.status}
                </Typography>
              </Box>
            </>
          )}
        </Paper>

        <Paper 
          ref={chatBoxRef}
          elevation={3} 
          sx={{ 
            p: 2, 
            flexGrow: 1, 
            mb: 2, 
            overflowY: 'auto',
            bgcolor: '#f7f7f7'
          }}
        >
          {messages.map((msg, index) => (
            <Box
              key={index}
              sx={{
                display: 'flex',
                justifyContent: msg.outgoing ? 'flex-end' : 'flex-start',
                mb: 2
              }}
            >
              {!msg.outgoing && (
                <Avatar
                  src={`/uploaded_img/${chatUser?.img}`}
                  sx={{ mr: 1, width: 40, height: 40 }}
                />
              )}
              <Paper
                elevation={1}
                sx={{
                  p: 2,
                  maxWidth: '70%',
                  bgcolor: msg.outgoing ? '#2196f3' : '#fff',
                  color: msg.outgoing ? '#fff' : 'inherit',
                  borderRadius: msg.outgoing ? '18px 18px 0 18px' : '18px 18px 18px 0'
                }}
              >
                {msg.msg_img ? (
                  <img 
                    src={`/uploaded_img/${msg.msg_img}`} 
                    alt="Chat image"
                    style={{ maxWidth: '100%', maxHeight: 150 }}
                  />
                ) : (
                  <Typography>{msg.msg}</Typography>
                )}
              </Paper>
            </Box>
          ))}
        </Paper>

        <Paper elevation={3} sx={{ p: 2 }}>
          <Box component="form" onSubmit={handleSendMessage} sx={{ display: 'flex', gap: 1 }}>
            <TextField
              fullWidth
              value={newMessage}
              onChange={(e) => setNewMessage(e.target.value)}
              placeholder="Type a message here..."
              variant="outlined"
              size="small"
            />
            <input
              type="file"
              accept="image/*"
              onChange={handleImageUpload}
              style={{ display: 'none' }}
              id="image-upload"
            />
            <IconButton
              component="label"
              htmlFor="image-upload"
              color="primary"
            >
              <img src="/images/camera.svg" alt="Upload" style={{ width: 24 }} />
            </IconButton>
            <IconButton
              type="submit"
              color="primary"
              disabled={!newMessage.trim()}
            >
              <img src="/images/send.svg" alt="Send" style={{ width: 24 }} />
            </IconButton>
          </Box>
        </Paper>
      </Box>
    </Container>
  );
}

export default Chat;