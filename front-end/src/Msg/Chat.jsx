import { useState } from "react";
import { Link } from "react-router-dom";
import { MdArrowBackIos } from "react-icons/md";
import logo from "../assets/logo1.png";

export default function LoginForm() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();

    if (!email || !password) {
      setError("សូមបញ្ចូលព័ត៌មានទាំងអស់។");
      return;
    }

    setError("");
    console.log("Login successful", { email, password });
  };

  return (
    <div className="flex flex-col min-h-screen px-4 py-8 items-center bg-gray-00">
      {/* Back Button */}
      <div className="w-full max-w-sm mb-4">
        <Link
          to="/"
          className="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium"
        >
          <MdArrowBackIos className="text-2xl" />
        </Link>
      </div>

      {/* Login Form */}
      <form
        onSubmit={handleSubmit}
        className="bg-white p-6 sm:p-10 rounded-3xl w-full max-w-sm "
      >
        {/* Logo */}
        <div className="flex justify-center mb-10">
          <img
            src={logo}
            alt="logo"
            className="w-16 h-16 rounded-full object-cover"
          />
        </div>

        {/* Error Message */}
        {error && (
          <div className="mb-4 text-red-600 text-center font-medium text-sm">
            {error}
          </div>
        )}

        {/* Email Input */}
        <div className="mb-4">
          <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="អ៊ីមែល"
            className="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        {/* Password Input */}
        <div className="mb-2">
          <input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            placeholder="ពាក្យសម្ងាត់"
            className="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

       

        {/* Login Button */}
        <button
          type="submit"
          className="w-full mb-4 bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 rounded-2xl font-semibold transition duration-200"
        >
          ចូលគណនី
        </button>

         {/* Forgot Password Link */}
        <div className="mb-[10rem] text-center">
          <Link
            to="#"
            className="text-blue-600 text-sm hover:underline"
          >
            ភ្លេចពាក្យសម្ងាត់?
          </Link>
        </div>

        {/* Register Button */}
        <Link to="/registerform">
          <button
            type="button"
            className="w-full border border-blue-600 text-blue-600 text-sm py-2 rounded-2xl font-semibold hover:border-green-600 hover:text-green-500 transition duration-200"
          >
            បង្កើតគណនីថ្មី
          </button>
        </Link>
      </form>
    </div>
  );
}
