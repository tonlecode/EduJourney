import React from "react";
import { Link } from "react-router-dom";
import {
  IoHomeOutline,
  IoBookOutline,
  IoSettingsOutline,
} from "react-icons/io5";
import { RiNewspaperLine } from "react-icons/ri";

// Images
// Logos
import logo from "../assets/logo1.png";

// Icons
import iconB from "../assets/iconB.png";
import iconK from "../assets/iconK.webp";
import iconE from "../assets/iconE.webp";
import iconP from "../assets/iconP.webp";
import iconT from "../assets/iconT.webp";
import iconC from "../assets/iconC.png";

export default function NavigationC() {
  return (
    <div className="flex  bg-gradient-to-br from-gray-50 to-blue-50">
      {/* Sidebar */}
      <aside className="w-[20rem] bg-white border-r p-6 flex flex-col justify-between fixed h-screen shadow-lg backdrop-blur-lg bg-white/90">
        <div>
          {/* Logo */}
          <div className="mb-8">
            <div className="flex items-center space-x-3 hover:transform hover:scale-105 transition-transform duration-300 cursor-pointer">
              <img className="w-12 h-12 bg-blue-600 rounded-xl shadow-lg" src={logo} alt="Logo" />
              <span className="font-bold text-2xl text-blue-600 font-poppins tracking-wide">Edujourney</span>
            </div>
          </div>

          {/* Menu */}
          <nav className="space-y-4 font-sans mb-12">
            <Link to="/">
              <MenuItem icon={<IoHomeOutline className="text-xl" />} text="Home" active />
            </Link>
            <Link to="/books">
              <MenuItem icon={<IoBookOutline className="text-xl" />} text="Books" />
            </Link>
            <Link to="/news">
              <MenuItem icon={<RiNewspaperLine className="text-xl" />} text="News" />
            </Link>
            <Link to="/settings">
              <MenuItem icon={<IoSettingsOutline className="text-xl" />} text="Setting" />
            </Link>
          </nav>

          {/* Types of Content */}
          <div className="w-full">
            <div className="bg-gradient-to-br from-blue-50 to-white shadow-xl rounded-3xl p-6 transition-all duration-300 hover:shadow-2xl">
              <div className="flex items-center gap-3 mb-8">
                <div className="h-6 w-1.5 bg-blue-600 rounded-full"></div>
                <h2 className="text-2xl font-semibold text-gray-800">Types of Content</h2>
              </div>

              <div className="grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-2">
                {[
                  { icon: iconB, title: "អប់រំផ្លូវចិត្ត", link: "#" },
                  { icon: iconK, title: "ដឹងទូរទៅ", link: "#" },
                  { icon: iconE, title: "អង់គ្លេស", link: "#" },
                  { icon: iconP, title: "ភតខាស", link: "#" },
                  { icon: iconT, title: "បច្ចេកវិទ្យា", link: "#" },
                  { icon: iconC, title: "តុក្កតា", link: "#" },
                ].map((item, index) => (
                  <a href={item.link} key={index} className="block group">
                    <div className="bg-white border border-gray-200 rounded-2xl p-4 flex flex-col items-center shadow-sm transition-all duration-300 hover:border-blue-600 hover:shadow-md hover:-translate-y-1">
                      <img
                        src={item.icon}
                        alt={item.title}
                        className="w-14 h-14 object-contain mb-3 transition-transform duration-300 group-hover:scale-110"
                      />
                      <p className="text-sm font-medium text-center text-gray-700 group-hover:text-blue-600">
                        {item.title}
                      </p>
                    </div>
                  </a>
                ))}
              </div>
            </div>
          </div>
        </div>

        {/* Profile */}
        <div className="pt-6">
          <div className="flex items-center space-x-3 bg-blue-50 p-3 rounded-2xl hover:bg-blue-100 transition-all duration-300 cursor-pointer">
            <img
              src="https://randomuser.me/api/portraits/men/75.jpg"
              alt="Tom Cook"
              className="w-10 h-10 rounded-full border-2 border-blue-300"
            />
            <span className="text-sm font-medium font-sans text-gray-700">Ry Chet</span>
          </div>
        </div>
      </aside>
    </div>
  );
}

function MenuItem({ icon, text, active }) {
  return (
    <div
      className={`flex items-center space-x-2 px-3 py-2 rounded-md cursor-pointer hover:bg-gray-100 ${active ? "bg-blue-50 text-blue-600 font-semibold" : "text-gray-700"}`}
    >
      <span className="w-5 h-5">{icon}</span>
      <span>{text}</span>
    </div>
  );
}
