import { useState } from "react";
import { Link } from "react-router-dom";
import logo from "../assets/logo1.png";
import { MdArrowBackIos } from "react-icons/md";

export default function RegisterForm() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm, setConfirm] = useState("");
  const [error, setError] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();

    if (!name || !email || !password || !confirm) {
      setError("សូមបញ្ចូលព័ត៌មានទាំងអស់។");
      return;
    }

    if (password !== confirm) {
      setError("ពាក្យសម្ងាត់មិនផ្គូផ្គង!");
      return;
    }

    setError("");
    console.log("Register successful", { name, email, password });
  };

  return (
    <div className="min-h-screen  p-4">
      {/* Back button */}
      <div className="max-w-sm mx-auto mb-4">
        <Link
          to="/chat"
          className="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium"
        >
          <MdArrowBackIos className=" text-2xl" />
        
        </Link>
      </div>

      <div className="flex items-center justify-center">
        <form
          onSubmit={handleSubmit}
          className="bg-white p-6 sm:p-8 rounded-3xl  w-full max-w-sm "
        >
          {/* Logo */}
          <div className="flex justify-center mb-6">
            <img
              src={logo}
              alt="logo"
              className="w-16 h-16 rounded-full object-cover"
            />
          </div>

          {error && (
            <div className="mb-4 text-red-500 text-sm text-center font-medium">
              {error}
            </div>
          )}

          {[
            { label: "ឈ្មោះ", type: "text", state: name, setState: setName, placeholder: "បញ្ចូលឈ្មោះរបស់អ្នក" },
            { label: "អ៊ីមែល", type: "email", state: email, setState: setEmail, placeholder: "បញ្ចូលអ៊ីមែលរបស់អ្នក" },
            { label: "ពាក្យសម្ងាត់", type: "password", state: password, setState: setPassword, placeholder: "បញ្ចូលពាក្យសម្ងាត់" },
            { label: "បញ្ជាក់ពាក្យសម្ងាត់", type: "password", state: confirm, setState: setConfirm, placeholder: "បញ្ចាក់ពាក្យសម្ងាត់" }
          ].map((field, idx) => (
            <div className="mb-4" key={idx}>
              <label className="block text-gray-700 text-sm mb-1">{field.label}</label>
              <input
                type={field.type}
                value={field.state}
                onChange={(e) => field.setState(e.target.value)}
                className="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder={field.placeholder}
              />
            </div>
          ))}

          <button
            type="submit"
            className="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-xl mt-2 transition duration-200"
          >
            ចុះឈ្មោះ
          </button>

          <p className="mt-5 text-center text-sm text-gray-600">
            មានគណនីរួចហើយ?{" "}
            <Link to="/chat" className="text-blue-600 hover:underline font-medium">
              ចូលគណនី
            </Link>
          </p>
        </form>
      </div>
    </div>
  );
}
