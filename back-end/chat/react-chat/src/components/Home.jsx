import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { Box, List, ListItem, ListItemAvatar, ListItemText, Avatar, Typography, Container, Paper, IconButton } from '@mui/material';
import axios from 'axios';

function Home() {
  const navigate = useNavigate();
  const [users, setUsers] = useState([]);
  const [error, setError] = useState('');

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axios.get('/api/users');
        setUsers(response.data);
      } catch (err) {
        setError('Failed to load users');
      }
    };

    fetchUsers();
    const interval = setInterval(fetchUsers, 10000);
    return () => clearInterval(interval);
  }, []);

  const handleUserClick = (userId) => {
    navigate(`/chat/${userId}`);
  };

  return (
    <Container maxWidth="sm">
      <Box sx={{ mt: 4 }}>
        <Paper elevation={3} sx={{ p: 2 }}>
          <Typography variant="h5" gutterBottom align="center">
            Available Users
          </Typography>
          {error && (
            <Typography color="error" align="center" gutterBottom>
              {error}
            </Typography>
          )}
          <List>
            {users.map((user) => (
              <ListItem
                key={user.user_id}
                button
                onClick={() => handleUserClick(user.user_id)}
                sx={{ mb: 1, borderRadius: 1, '&:hover': { bgcolor: 'background.default' } }}
              >
                <ListItemAvatar>
                  <Avatar src={`/uploaded_img/${user.img}`} alt={user.name} />
                </ListItemAvatar>
                <ListItemText
                  primary={user.name}
                  secondary={user.status}
                />
              </ListItem>
            ))}
          </List>
        </Paper>
      </Box>
    </Container>
  );
}

export default Home;