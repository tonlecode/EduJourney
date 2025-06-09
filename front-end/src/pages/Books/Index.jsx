import React, { useEffect, useState } from 'react';
import Nav from "../../components/Navigation";
import Header from "../../components/Header";
import axios from 'axios';

const Index = () => {
  const [books, setBooks] = useState([]);
  const [expanded, setExpanded] = useState({}); // Track which descriptions are expanded

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/books')
      .then(response => {
        setBooks(response.data);
      })
      .catch(error => {
        console.error('Error fetching books:', error);
      });
  }, []);

  const toggleExpand = (id) => {
    setExpanded(prev => ({
      ...prev,
      [id]: !prev[id]
    }));
  };

  return (
    <div className="m-2">
      {/* Header */}
      <Header />

      <div className="max-w-5xl mx-auto mt-[1rem] space-y-7 pb-24">
        {books.map((book) => {
          const isLong = book.description.length > 200;
          const isExpanded = expanded[book.id];

          return (
           <div
  key={book.id}
  className="flex flex-col bg-gray-50 rounded-xl overflow-hidden shadow-sm"
>
  <img
    src={book.cover_image}
   
    className="w-full h-64 object-cover border-b border-gray-100"
  />
  <div className="p-3 flex flex-col space-y-2">
    
    <p className="text-gray-800 leading-relaxed text-sm">
      {isExpanded || !isLong
        ? book.description
        : `${book.description.slice(0, 300)}...`}
    </p>
    {isLong && (
      <button
        onClick={() => toggleExpand(book.id)}
        className="text-blue-600 hover:underline text-sm self-start"
      >
        {isExpanded ? 'ត្រឡប់' : 'អានច្រើនទៀត'}
      </button>
    )}
  </div>
</div>

          );
        })}
      </div>

      {/* Navigation */}
      <div className="fixed bottom-0 left-0 w-full z-50">
        <Nav />
      </div>
    </div>
  );
};

export default Index;
