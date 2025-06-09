import React, { useState, useRef, useEffect } from "react";
import { marked } from "marked";
import { MdOutlineArrowBackIos } from "react-icons/md";
import logo from "../assets/logo1.png"; // adjust path if needed
import { Link } from "react-router-dom";

export default function ChatBot() {
  const [userInput, setUserInput] = useState("");
  const [messages, setMessages] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  const messagesEndRef = useRef(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: "smooth" });
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  // Typewriter effect for bot reply
  const typeWriterEffect = (text, callback) => {
    let i = 0;
    let html = "";
    const interval = setInterval(() => {
      html += text[i];
      i++;
      callback(html);
      if (i >= text.length) clearInterval(interval);
    }, 20); // speed of typing
  };

  const sendMessage = async () => {
    if (!userInput.trim()) return;

    const userMessage = { sender: "user", content: userInput };
    setMessages((prev) => [...prev, userMessage]);
    setUserInput("");
    setIsLoading(true);

    try {
      const response = await fetch(
        "https://openrouter.ai/api/v1/chat/completions",
        {
          method: "POST",
          headers: {
            Authorization:
              "Bearer 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",
            "HTTP-Referer": "https://www.chetryinnocent.com",
            "X-Title": "chetryinnocent",
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            model: "deepseek/deepseek-r1:free",
            messages: [{ role: "user", content: userInput }],
          }),
        }
      );
      const data = await response.json();
      const rawContent =
        data.choices?.[0]?.message?.content || "No response received.";
      const htmlContent = marked.parse(rawContent);

      let currentText = "";
      setMessages((prev) => [...prev, { sender: "bot", content: "" }]);

      typeWriterEffect(htmlContent, (typedHtml) => {
        currentText = typedHtml;
        setMessages((prev) => {
          const newMessages = [...prev];
          newMessages[newMessages.length - 1] = {
            sender: "bot",
            content: typedHtml,
          };
          return newMessages;
        });
      });
    } catch (error) {
      const errorMsg = { sender: "bot", content: "Error: " + error.message };
      setMessages((prev) => [...prev, errorMsg]);
    } finally {
      setIsLoading(false);
    }
  };

  const handleBack = () => {
    window.history.back();
  };

  return (
    <div className="h-screen flex flex-col bg-gray-100">
      {/* Header */}
      <div className="bg-blue-600 text-white text-lg font-bold px-4 py-3 shadow flex items-center justify-between">
        <Link
          to="/"
          className="flex items-center text-white text-sm hover:text-gray-200"
        >
          <MdOutlineArrowBackIos className="text-xl mr-1 font-khmer" />
          ត្រឡប់
        </Link>
        <div className="flex items-center">
          <img
            src={logo}
            alt="Chat Logo"
            className="h-8 w-8 mr-2 rounded-full object-cover font-khmer"
          />
          EduJourney
        </div>
        <div className="w-12" />
      </div>

      {/* Message Area */}
      <div className="flex-1 overflow-y-auto p-4 space-y-4">
        {messages.map((msg, index) => (
          <div
            key={index}
            className={`max-w-[80%] px-4 py-2 rounded-lg shadow text-sm transition-all duration-300 ${
              msg.sender === "user"
                ? "bg-blue-500 text-white self-end ml-auto"
                : "bg-white text-gray-800"
            }`}
            dangerouslySetInnerHTML={{ __html: msg.content }}
          />
        ))}

        {isLoading && (
          <div className="flex items-center space-x-2 text-gray-500 text-sm">
            <div className="w-4 h-4 border-2 border-t-2 border-gray-300 rounded-full animate-spin"></div>
            <span className="font-khmer">សូមរងចាំបន្តិច...</span>
          </div>
        )}
        <div ref={messagesEndRef} />
      </div>

      {/* Input */}
      <div className="p-4 border-t bg-white flex items-center gap-2 font-khmer">
        <input
          type="text"
          placeholder="សរសេរសំណួររបស់អ្នក..."
          value={userInput}
          onChange={(e) => setUserInput(e.target.value)}
          onKeyDown={(e) => e.key === "Enter" && sendMessage()}
          className="font-khmer flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <button
          onClick={sendMessage}
          className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-khmer"
        >
          បញ្ជូន
        </button>
      </div>
    </div>
  );
}
