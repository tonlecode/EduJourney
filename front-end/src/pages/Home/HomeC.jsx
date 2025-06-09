import React from 'react'
import NavigationC from '../../components/NavigationC';
import logo from '../../assets/logo1.png';
import ch from '../../assets/ch.jpg';
import ph from '../../assets/ph.jpg';
import pro1 from '../../assets/pro1.jpg';
import pro2 from '../../assets/pro2.jpg';
import pro3 from '../../assets/pro3.jpg';
import pro4 from '../../assets/pro4.jpg';
import pro5 from '../../assets/pro5.jpg';
import pro6 from '../../assets/pro6.jpg';

function HomeC() {
  const videos = [
    {
	videoId: "iSq63-rT47c",
	title: "ក្ដីសង្ឃឹមជីវិត | The Hope | នឹម ឈុន្នី",
	author: "Noem Chhunny",
	avatar: ch,
	views: "123K",
	timeAgo: "2 days ago",
    },
    {
	videoId: "qawo7BAtVr0",
	title:
	  "រឿង ព្រះសង្ឃនិមន្តបិណ្ឌបាត្រ | ព្រះគ្រូធម្មាចារ្យ ផុន​ ភក្តី | Educate Mind/ 2025",
	author: "អប់រំចិត្ត-Educate Mind",
	avatar: ph,
	views: "48,382K",
	timeAgo: "1 month ago",
    },
    {
	videoId: "X9QZz7Jh6Dc",
	title: "ការអប់រំកូនក្នុងគ្រួសារ | សុខ វិបុល",
	author: "Sok Vipul Official",
	avatar: pro1,
	views: "75K",
	timeAgo: "1 week ago",
    },
    {
	videoId: "Y2JyGLhVZXE",
	title: "មេរៀនជីវិត | Life Lessons | គ្រូ ជា វណ្ណៈ",
	author: "Chea Vanna",
	avatar: pro2,
	views: "92K",
	timeAgo: "3 days ago",
    },
    {
	videoId: "pWJ5wHk_lP0",
	title:
	  "របៀបរៀនភាសាអង់គ្លេសឲ្យបានល្អ | How to Learn English Effectively",
	author: "English Cambodia",
	avatar: pro3,
	views: "156K",
	timeAgo: "5 days ago",
    },
    {
	videoId: "8mFV4y0wHKQ",
	title: "បច្ចេកវិទ្យាថ្មីៗក្នុងការអប់រំ | New Technology in Education",
	author: "Tech Education KH",
	avatar: pro4,
	views: "63K",
	timeAgo: "1 week ago",
    },
    {
	videoId: "L2QF6Dm_CxE",
	title: "គន្លឹះក្នុងការរៀនគណិតវិទ្យា | Mathematics Learning Tips",
	author: "Math Master KH",
	avatar: pro5,
	views: "88K",
	timeAgo: "4 days ago",
    },
    {
	videoId: "RzBHrT6JZhA",
	title: "ការអភិវឌ្ឍន៍ខ្លួន | Personal Development | សៀង សុខុម",
	author: "Sieng Sokhom",
	avatar: pro6,
	views: "102K",
	timeAgo: "6 days ago",
    },
  ];
  return (
    <div>
      <NavigationC />
      {/* Main Content */}
      <main className="flex-1 pl-[20rem] pr-4 bg-transparent">
	  <div className="mb-10 max-w-4xl mx-auto">
	    <div className="relative">
		<input
		  className="w-full bg-white/80 backdrop-blur-lg border-2 border-blue-100 rounded-2xl py-4 px-6 pl-14 text-gray-700 focus:outline-none focus:border-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl text-lg"
		  type="text"
		  placeholder="Search for content..."
		/>
		<svg
		  className="absolute left-5 top-1/2 transform -translate-y-1/2 text-blue-400 w-6 h-6"
		  fill="none"
		  stroke="currentColor"
		  viewBox="0 0 24 24"
		  xmlns="http://www.w3.org/2000/svg"
		>
		  <path
		    strokeLinecap="round"
		    strokeLinejoin="round"
		    strokeWidth="2"
		    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
		  />
		</svg>
	    </div>
	  </div>

	  <div className="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-[90rem] mx-auto px-4">
	    {/* Video List */}
	    <div className="border-2 border-blue-100 rounded-3xl h-[85vh] bg-white/90 backdrop-blur-lg p-8 shadow-xl hover:shadow-2xl transition-all duration-300 overflow-y-auto">
		<div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2">
		  {videos.map((video, index) => (
		    <div
			key={index}
			className="bg-blue-50 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
		    >
			<div className="relative w-full pb-[56.25%] h-0 overflow-hidden">
			  <iframe
			    className="absolute top-0 left-0 w-full h-full"
			    src={`https://www.youtube.com/embed/${video.videoId}`}
			    title="YouTube video player"
			    frameBorder="0"
			    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			    allowFullScreen
			  />
			</div>
			<div className="p-4 space-y-3">
			  <h3 className="text-lg font-semibold text-gray-800 line-clamp-2 hover:text-blue-600 transition-colors">
			    {video.title}
			  </h3>
			  <div className="flex items-center space-x-3">
			    <img
				className="w-10 h-10 rounded-full border-2 border-blue-500 transition-transform hover:scale-110"
				src={video.avatar}
				alt={video.author}
			    />
			    <p className="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
				{video.author}
			    </p>
			  </div>
			  <div className="flex items-center space-x-2 text-sm text-gray-500">
			    <span>{video.views} views</span>
			    <span>•</span>
			    <span>{video.timeAgo}</span>
			  </div>
			</div>
		    </div>
		  ))}
		</div>
	    </div>

	    {/* Chat Area */}
	    <div className="border border-dashed rounded-lg h-[85vh] mr-4 max-w-[42rem] ml-auto bg-white/90 backdrop-blur-lg p-4 shadow-lg hover:shadow-xl transition-all duration-300 overflow-y-auto">
		<div className="flex flex-col h-full">
		  {/* Messages */}
		  <div className="flex-1 overflow-y-auto mb-6 space-y-6 p-4">
		    <div className="flex items-start space-x-4">
			<div className="flex-shrink-0">
			  <img
			    src={logo}
			    alt="AI Assistant"
			    className="w-12 h-12 rounded-full border-2 border-blue-300 shadow-md hover:scale-105 transition-transform duration-300"
			  />
			</div>
			<div className="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-5 max-w-[80%] shadow-md hover:shadow-lg transition-all duration-300">
			  <p className="text-gray-800 text-lg font-medium leading-relaxed">
			    សួស្តី! ខ្ញុំជាជំនួយការ AI របស់អ្នក។ តើខ្ញុំអាចជួយអ្នកបានយ៉ាងដូចម្តេច?
			  </p>
			</div>
		    </div>
		  </div>

		  {/* Input */}
		  <div className="border-t-2 border-blue-50 pt-6">
		    <div className="relative flex items-center space-x-4">
			<input
			  type="text"
			  placeholder="សូមសរសំណួរអ្វីក៏បាន..."
			  className="flex-1 px-6 py-4 pr-14 rounded-2xl border-2 border-blue-100 focus:border-blue-500 focus:outline-none transition-all duration-300 text-lg shadow-md hover:shadow-lg bg-white/80 backdrop-blur-sm"
			/>
			<label className="cursor-pointer hover:transform hover:scale-110 transition-transform duration-300">
			  <input type="file" accept="image/*" className="hidden" />
			  <div className="p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors duration-300">
			    <svg
				xmlns="http://www.w3.org/2000/svg"
				className="h-6 w-6 text-blue-600 hover:text-blue-700"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
			    >
				<path
				  strokeLinecap="round"
				  strokeLinejoin="round"
				  strokeWidth={2}
				  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
				/>
			    </svg>
			  </div>
			</label>
			<button className="p-3 bg-blue-600 rounded-xl text-white hover:bg-blue-700 hover:transform hover:scale-110 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
			  <svg
			    xmlns="http://www.w3.org/2000/svg"
			    className="h-6 w-6"
			    fill="none"
			    viewBox="0 0 24 24"
			    stroke="currentColor"
			  >
			    <path
				strokeLinecap="round"
				strokeLinejoin="round"
				strokeWidth={2}
				d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
			    />
			  </svg>
			</button>
		    </div>
		  </div>
		</div>
	    </div>
	  </div>
	</main>
    </div>
  )
}

export default HomeC