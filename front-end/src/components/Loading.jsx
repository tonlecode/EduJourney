import React from 'react';

const Loading = () => {
  return (
    <div className="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-90 z-50">
      <div className="relative">
        {/* Optimized dual spinner */}
        <div className="absolute inset-0 rounded-full border-[3px] border-t-blue-500 border-r-blue-500 border-b-transparent border-l-transparent w-14 h-14 animate-[spin_1s_linear_infinite]"></div>
        <div className="absolute inset-1 rounded-full border-[3px] border-t-purple-500 border-r-purple-500 border-b-transparent border-l-transparent w-12 h-12 animate-[spin_1s_linear_infinite_reverse]"></div>
      </div>
      
      {/* Bilingual loading text */}
      <div className="ml-4 text-center">
        <h3 className="text-lg font-semibold text-blue-500 mb-1">Loading... / កំពុងផ្ទុក...</h3>
        <p className="text-gray-300 text-xs">Please wait / សូមរង់ចាំ</p>
      </div>

      {/* Optimized floating icons */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        {['📚', '🧠', '🔬', '🔢', '📜', '🏛️'].map((icon, index) => (
          <div
            key={index}
            className="absolute text-2xl opacity-20"
            style={{
              left: `${(index * 20) % 100}%`,
              top: `${(index * 15) % 100}%`,
              animation: `float 3s ease-in-out infinite`,
              animationDelay: `${index *0.5}s`
            }}
          >
            {icon}
          </div>
        ))}
      </div>

      <style jsx>{`
        @keyframes float {
          0%, 100% { transform: translateY(0); }
          50% { transform: translateY(-10px); }
        }
      `}</style>
    </div>
  );
};

export default Loading;