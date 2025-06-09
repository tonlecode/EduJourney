

import React, { useState, useEffect } from "react";
import axios from "axios";
// Import Profile Images
import pro1 from "../../../assets/pro1.jpg";
import pro2 from "../../../assets/pro2.jpg";
import pro3 from "../../../assets/pro3.jpg";
import pro4 from "../../../assets/pro4.jpg";
import pro5 from "../../../assets/pro5.jpg";
import pro6 from "../../../assets/pro6.jpg";

// Import Content Images
import chet from "../../../assets/chet.jpg";

// Import Components
import Nav from "../../../components/Navigation";
import Header from "../../../components/Header";

export default function Index() {
  const [isNavVisible, setIsNavVisible] = useState(true);

  // Array of profile images
  const profiles = [pro1, pro2, pro3, pro4, pro5, pro6, pro1, pro2, pro3, pro4, pro5, pro6];

  // Array of YouTube video URLs
  const [buddhas, setBuddhas] = useState([]);

  useEffect(() => {
    axios
      .get("http://127.0.0.1:8000/api/v1/buddhas") 
      .then((res) => setBuddhas(res.data))
      .catch((err) => console.error(err));
  }, []);

  useEffect(() => {
    const handleScroll = () => {
	setIsNavVisible(window.scrollY <= 100);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <div className="m-2">
	{/* Header */}
	<Header />

	{/* Profile Followers */}
	<div className="flex mt-3 overflow-x-auto mb-8 w-full">
	  {profiles.map((profile, index) => (
	    <a href="#" key={index}>
		<div className="mx-[1px] p-[2px] rounded-full bg-gradient-to-tr from-orange-500 via-purple-500 to-pink-500">
		  <img
		    src={profile}
		    alt="Profile"
		    className="min-w-[60px] min-h-[60px] max-w-[60px] max-h-[60px] rounded-full bg-white"
		  />
		</div>
	    </a>
	  ))}
	</div>

	{/* YouTube Videos */}
	<div className="bg-blue-100 rounded-xl overflow-hidden transition-all duration-300 my-4 ">
  <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

  {buddhas.map((b) => (
  <div
    key={b.id}
    className="relative w-full pb-[56.25%] h-0 overflow-hidden rounded-lg shadow-lg transition-transform transform "
  >
    <iframe
      className="absolute top-0 left-0 w-full h-full rounded-lg"
      src={b.youtube_link}

      frameBorder="0"
       allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
	
      allowFullScreen
    />
  </div>
))}

  </div>
</div>


	{/* Content Section */}
	<div className="bg-blue-100 h-auto rounded-lg py-1 mt-2">
	  <div className="flex items-center justify-center text-center">
	    <a href="">
		<img
		  src={pro1}
		  alt="Profile"
		  className="w-[50px] h-[50px] rounded-full m-1 border-blue-600 border-2"
		/>
	    </a>
	    <h3 className="mt-4 opacity-75">Ry Chet - រី ចិត្ត</h3>
	  </div>
	  <a href="#">
	    <img src={chet} alt="Content" className="rounded-lg" />
	  </a>
	  <p className="opacity-75 text-left px-1 text-sm">
	    🧑🙏🙏 Lorem ipsum dolor, sit amet consectetur adipisicing elit.
	  </p>
	</div>

	{/* Navigation */}
	<div
	  className={`fixed left-0 w-full transition-opacity duration-500 ease-in-out ${
	    isNavVisible ? "opacity-100" : "opacity-0"
	  }`}
	>
	  <Nav />
	</div>
    </div>
  );
}