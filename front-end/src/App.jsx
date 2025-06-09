import './App.css'
//import pages
import Home from './pages/Home/Index.jsx'
import HomeC from './pages/Home/HomeC.jsx'
import News from './pages/News/Index.jsx'
import Types from './pages/Types/index.jsx'
import Books from './pages/Books/Index.jsx'
import Settings from './pages/Setting/Index.jsx'
import Buddha from './pages/Types/Contents/Buddha.jsx'
import Cartoon from './pages/Types/Contents/Cartoon.jsx'
import English from './pages/Types/Contents/English.jsx'
import Knowledge from './pages/Types/Contents/knowledge.jsx'
import Podcast from './pages/Types/Contents/Podcast.jsx'
import Technology from './pages/Types/Contents/Technology.jsx'
import { LoadingProvider } from './context/LoadingContext'
import Chat from './Msg/Chat.jsx'
import RegisterForm from './Msg/RegisterForm.jsx'


//chat AI ask
import ChatBot from './ChatAI/ChatBot.jsx'  


import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

function App() {
  return (
    <LoadingProvider>
      <div className='lg:hidden'>
        <Router>
          <Routes>
            <Route path="/" element={<Types />} />
            <Route path="/home" element={<Home />} />
            <Route path="/books" element={<Books />} />
            <Route path="/news" element={<News />} />
            <Route path='/chat' element={<Chat/>} />
            <Route path='/chatbot' element={<ChatBot/>} />
            <Route path='/registerform' element={<RegisterForm/>} />
            <Route path="/types/contents/buddha" element={<Buddha />} />
            <Route path="/types/contents/cartoon" element={<Cartoon />} />
            <Route path="/types/contents/english" element={<English />} />
            <Route path="/types/contents/knowledge" element={<Knowledge />} />
            <Route path="/types/contents/podcast" element={<Podcast />} />
            <Route path="/types/contents/technology" element={<Technology />} />
            <Route path="/settings" element={<Settings />} />
        
          </Routes>
        </Router>
      </div>
      <div className='hidden lg:block'>
        <Router>
          <Routes>
            <Route path="/" element={<HomeC />} />
           
          </Routes>
        </Router>
      </div>
    </LoadingProvider>
  )
}

export default App

