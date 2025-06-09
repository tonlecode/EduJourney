import React, { useState, useEffect } from "react";
import axios from "axios";

// Import Components
import Nav from "../../components/Navigation";
import Header from "../../components/Header";

export default function Index() {
  const [isNavVisible, setIsNavVisible] = useState(true);
  const [news, setNews] = useState([]);
  const [expandedItems, setExpandedItems] = useState({});

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/news')
      .then(response => {
        setNews(response.data);
      })
      .catch(error => {
        console.error('Error fetching news:', error);
      });
  }, []);

  useEffect(() => {
    const handleScroll = () => {
      setIsNavVisible(window.scrollY <= 100);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const toggleExpand = (id) => {
    setExpandedItems(prev => ({
      ...prev,
      [id]: !prev[id]
    }));
  };

  return (
    <div>
      {/* Header */}
      <div className="mb-8">
        <Header />
      </div>

      {/* News Grid */}
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4">
        {news.map((item) => {
          const isExpanded = expandedItems[item.id];
          const shouldTruncate = item.description.length > 300;

          return (
            <div
              key={item.id}
              className="bg-white rounded-xl  overflow-hidden "
            >
              <a href="#" className="block">
                <img
                  src={item.cover_image || item.image_path}
                  alt={item.title}
                  className="w-full h-[180px] object-cover rounded-t-xl"
                />
              </a>
              <div className="p-4">
             
                <p className="text-gray-700 text-sm leading-relaxed mb-3">
                  {isExpanded || !shouldTruncate
                    ? item.description
                    : item.description.substring(0, 300) + "..."}
                </p>
                {shouldTruncate && (
                  <button
                    onClick={() => toggleExpand(item.id)}
                    className="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors duration-200"
                  >
                    {isExpanded ? "Show less" : "Read more"}
                    <svg
                      className="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M9 5l7 7-7 7"
                      />
                    </svg>
                  </button>
                )}
              </div>
            </div>
          );
        })}
      </div>

      {/* Navigation */}
      <div
        className={`fixed left-0 w-full transition-opacity duration-500 ease-in-out ${isNavVisible ? "opacity-100" : "opacity-0"}`}
      >
        <Nav />
      </div>
    </div>
  );
}
