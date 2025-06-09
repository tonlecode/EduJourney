import React from 'react'
import { useLocation, Link } from 'react-router-dom';
import { IoHomeOutline } from "react-icons/io5";
import { IoBookOutline } from "react-icons/io5";
import { MdOutlineDashboard } from "react-icons/md";
import { RiNewspaperLine } from "react-icons/ri";
import { IoSettingsOutline } from "react-icons/io5";
import { useLoading } from '../context/LoadingContext';

function Nav() {
  const location = useLocation();
  const currentPath = location.pathname;
  const { setIsLoading } = useLoading();

  const isActive = (path) => currentPath === path;

  const handleNavClick = () => {
    setIsLoading(true);
    setTimeout(() => setIsLoading(false), 1000);
  };

  return (
    <nav className="fixed bottom-0 left-0 right-0 px-2 bg-white/95 backdrop-blur-sm border-t border-gray-100 shadow-lg">
      <div className="max-w-screen-xl mx-auto flex justify-between items-center px-4">
        <Link to="/home" onClick={handleNavClick} className={`nav-item group ${isActive('/') ? 'text-blue-600' : ''}`}>
          <div className="flex flex-col items-center transition-all duration-300 transform group-hover:-translate-y-1">
            <IoHomeOutline className={`text-2xl ${isActive('/home') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`} />
            <p className={`text-xs font-medium mt-1 ${isActive('/home') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`}>Home</p>
          </div>
        </Link>
        
        <Link to="/books" onClick={handleNavClick} className={`nav-item group ${isActive('/books') ? 'text-blue-600' : ''}`}>
          <div className="flex flex-col items-center transition-all duration-300 transform group-hover:-translate-y-1">
            <IoBookOutline className={`text-2xl ${isActive('/books') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`} />
            <p className={`text-xs font-medium mt-1 ${isActive('/books') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`}>Books</p>
          </div>
        </Link>
        
        <Link to="/" onClick={handleNavClick} className="nav-item group">
          <div className="flex flex-col items-center bg-gradient-to-r from-blue-600 to-blue-500 p-2 rounded-2xl shadow-blue-200 shadow-lg transition-all duration-300 transform -translate-y-2 hover:-translate-y-4 hover:shadow-xl">
            <MdOutlineDashboard className="text-2xl text-white" />
            <p className="text-xs font-medium mt-1 text-white">Types</p>
          </div>
        </Link>
        
        <Link to="/news" onClick={handleNavClick} className={`nav-item group ${isActive('/news') ? 'text-blue-600' : ''}`}>
          <div className="flex flex-col items-center transition-all duration-300 transform group-hover:-translate-y-1">
            <RiNewspaperLine className={`text-2xl ${isActive('/news') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`} />
            <p className={`text-xs font-medium mt-1 ${isActive('/news') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`}>News</p>
          </div>
        </Link>
        
        <Link to="/settings" onClick={handleNavClick} className={`nav-item group ${isActive('/settings') ? 'text-blue-600' : ''}`}>
          <div className="flex flex-col items-center transition-all duration-300 transform group-hover:-translate-y-1">
            <IoSettingsOutline className={`text-2xl ${isActive('/settings') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`} />
            <p className={`text-xs font-medium mt-1 ${isActive('/settings') ? 'text-blue-600' : 'text-gray-600 group-hover:text-blue-600'}`}>Settings</p>
          </div>
        </Link>
      </div>
    </nav>
  )
}

export default Nav

