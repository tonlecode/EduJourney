

import React from 'react';
import { TbRobot } from "react-icons/tb";
import { HiOutlineChat } from "react-icons/hi";
import { Link } from "react-router-dom";
import logo from "../assets/logo1.png"; // adjust path if needed

export default function Header() {
  return (
    <header className="bg-white shadow-md w-full ">

      <div className="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        {/* Logo and Brand */}
        <div className="flex items-center space-x-3">
          <img
            src={logo}
            alt="EduJourney Logo"
            className="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover"
          />
          <h1 className="text-xl md:text-2xl font-bold text-blue-700">EduJourney</h1>
        </div>

        {/* Icon Buttons */}
        <div className="flex items-center space-x-4 text-blue-600 text-2xl md:text-3xl">
          <Link
            to="/chatbot"
            title="AI Assistant"
            className="hover:text-blue-800 transition-colors duration-200"
          >
            <TbRobot className=" text-3xl" />
          </Link>
         
          <a href="http://localhost/EduJourney/EduJourney/back-end/chat/home.php" className="hover:text-blue-800 transition-colors duration-200">
           <HiOutlineChat className=" text-3xl" />
          </a>
        </div>
      </div>
    </header>
  );
}
