import React, { useEffect, useRef } from "react";
import Nav from "../../components/Navigation";
// import img
import poster1 from "../../assets/poster1.jpg";
import poster2 from "../../assets/poster2.jpg";
import poster3 from "../../assets/poster3.jpg";
import poster4 from "../../assets/poster4.jpg";
import poster5 from "../../assets/poster5.jpg";
import { Link } from "react-router-dom";

import logo from "../../assets/logo1.png";

import iconB from "../../assets/iconB.png";
import iconK from "../../assets/iconK.webp";
import iconE from "../../assets/iconE.webp";
import iconP from "../../assets/iconP.webp";
import iconT from "../../assets/iconT.webp";
import iconC from "../../assets/iconC.png";
import { TbRobot } from "react-icons/tb";
import { HiOutlineChat } from "react-icons/hi";

function Index() {
  const scrollRef = useRef(null);

  useEffect(() => {
    const container = scrollRef.current;
    let scrollAmount = 0;
    const scrollStep = container ? container.clientWidth : window.innerWidth;
    const interval = setInterval(() => {
      if (container) {
        if (scrollAmount + container.clientWidth >= container.scrollWidth) {
          scrollAmount = 0;
        } else {
          scrollAmount += scrollStep;
        }

        container.scrollTo({
          left: scrollAmount,
          behavior: "smooth",
        });
      }
    }, 3000);

    return () => clearInterval(interval); // cleanup
  }, []);

  return (
    <div className="bg-gray-200 mt-[-7px] min-h-screen">
      {/* Header */}
      <div className="flex items-center justify-between px-4 py-2 bg-blue-100 shadow-md rounded-r-2xl mb-2 mx-2">
        <div className="flex items-center space-x-3">
          <img
            className="w-11 h-11 md:w-14 md:h-14 rounded-full object-cover"
            src={logo}
            alt="EduJourney Logo"
          />
          <h1 className="font-bold text-blue-700 text-xl md:text-2xl">
            EduJourney
          </h1>
        </div>
        <div className="flex items-center space-x-3 text-blue-600 text-2xl md:text-3xl pr-2">
          <Link
            to="/chatbot"
            title="AI Assistant"
            className="hover:text-blue-800 transition-colors duration-200"
          >
            <TbRobot className="text-3xl" />
          </Link>

          <a
            href="http://localhost/EduJourney/EduJourney/back-end/chat/home.php"
            className="hover:text-blue-800 transition-colors duration-200"
          >
            <HiOutlineChat className=" text-3xl" />
          </a>
        </div>
      </div>

      {/* end header */}

      {/* poster */}
      <div
        ref={scrollRef}
        className="flex overflow-x-auto scroll-smooth mb-1 md:max-w-[90%] md:mx-auto"
        style={{ scrollBehavior: "smooth" }}
      >
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster1}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster2}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster3}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster4}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster5}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster1}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster2}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster3}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster1}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster2}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster3}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster4}
          alt=""
        />
        <img
          className="rounded-lg w-full md:h-[400px] object-cover"
          src={poster5}
          alt=""
        />
      </div>
      {/* end poster */}

      {/* Types of Content */}
      <div className="rounded-lg max-h-[400px] bg-gradient-to-b from-blue-100 to-white pb-[15rem] shadow-lg md:max-h-none md:pb-20">
        <div className="flex items-center space-x-1 bg-white/90 backdrop-blur-sm p-2 rounded-t-lg mb-2 shadow-sm md:p-4">
          <div className="h-4 w-1 bg-blue-600 rounded-lg md:h-6"></div>
          <h1 className="text-gray-500 text-lg md:text-2xl">
            Types of Content
          </h1>
        </div>

        <div className="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-6 px-4 md:px-8 justify-items-center items-center">
          {[
            {
              icon: iconB,
              title: "អប់រំផ្លូវចិត្ត",
              link: "/types/contents/buddha",
            },
            { icon: iconK, title: "ចំណេះដឹងទូរទៅ", link: "#" },
            { icon: iconE, title: "អង់គ្លេស", link: "#" },
            { icon: iconP, title: "ភតខាស", link: "#" },
            { icon: iconT, title: "បច្ចេកវិទ្យា", link: "#" },
            { icon: iconC, title: "តុក្កតា", link: "/types/contents/cartoon" },
          ].map((item, index) => (
            <div key={index} className="group">
              <a href={item.link} className="block">
                <div className="bg-white/80 backdrop-blur-sm border-2 border-blue-200 rounded-2xl w-[95px] h-[120px] md:w-[140px] md:h-[160px] flex flex-col items-center justify-center p-2 transition-all duration-300 group-hover:border-blue-600 group-hover:shadow-lg group-hover:-translate-y-1">
                  <img
                    src={item.icon}
                    alt={item.title}
                    className="w-11 h-11 md:w-16 md:h-16 object-contain transition-transform duration-300 group-hover:scale-110"
                  />
                  <p className="text-center text-sm md:text-base text-gray-700 mt-1 font-medium group-hover:text-blue-600 transition-colors duration-300">
                    {item.title}
                  </p>
                </div>
              </a>
            </div>
          ))}
        </div>
      </div>

      {/* Navigation */}
      <Nav />
    </div>
  );
}

export default Index;
