import React, { useState } from 'react';
import { IoMoon, IoSunny } from 'react-icons/io5';
import { IoLanguageOutline } from 'react-icons/io5';
import { IoLogInOutline, IoLogOutOutline } from 'react-icons/io5';
import { IoNotificationsOutline } from 'react-icons/io5';
import { IoPersonOutline } from 'react-icons/io5';
import { IoMailOutline } from 'react-icons/io5';
import { IoCallOutline } from 'react-icons/io5';
import { IoPencilOutline } from 'react-icons/io5';
import Nav from '../../components/Navigation';

export default function Index() {
  const [darkMode, setDarkMode] = useState(false);
  const [language, setLanguage] = useState('en');
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [userProfile, setUserProfile] = useState({
    name: 'Ry Chet',
    email: 'chet@example.com',
    phone: '+855 12 345 678',
    bio: 'Software Developer',
    profilePicture: null
  });
  const [notifications, setNotifications] = useState({
    enabled: false,
    push: false,
    email: false,
    inApp: false,
    content: {
      news: true,
      books: true,
      updates: true
    }
  });

  const toggleTheme = () => {
    setDarkMode(!darkMode);
    // Add actual theme implementation here
  };

  const handleLanguageChange = (lang) => {
    setLanguage(lang);
    // Add actual language change implementation here
  };

  const toggleAuth = () => {
    setIsLoggedIn(!isLoggedIn);
    // Add actual authentication implementation here
  };

  const toggleNotification = (type) => {
    if (type === 'main') {
      setNotifications(prev => ({
        ...prev,
        enabled: !prev.enabled
      }));
    } else if (type.startsWith('content.')) {
      const contentType = type.split('.')[1];
      setNotifications(prev => ({
        ...prev,
        content: {
          ...prev.content,
          [contentType]: !prev.content[contentType]
        }
      }));
    } else {
      setNotifications(prev => ({
        ...prev,
        [type]: !prev[type]
      }));
    }
  };

  return (
    <div className="min-h-screen bg-gray-50 mb-[3rem]">
      
      <div className="max-w-md mx-auto p-6 space-y-6">
        {/* User Profile */}
        <div className="bg-white rounded-xl p-4 shadow-sm">
          <div className="flex items-center space-x-3 mb-4">
            <IoPersonOutline className="text-2xl text-blue-600" />
            <span className="font-medium">User Profile</span>
          </div>
          
          <div className="flex flex-col items-center mb-4">
            <div className="relative">
              <div className="w-24 h-24 rounded-full bg-gray-200 overflow-hidden">
                {userProfile.profilePicture ? (
                  <img 
                    src={userProfile.profilePicture} 
                    alt="Profile" 
                    className="w-full h-full object-cover"
                  />
                ) : (
                  <div className="w-full h-full flex items-center justify-center">
                    <IoPersonOutline className="text-4xl text-gray-400" />
                  </div>
                )}
              </div>
              <button className="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition-colors">
                <IoPencilOutline className="text-sm" />
              </button>
            </div>
          </div>

          <div className="space-y-3">
            <div className="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
              <div className="flex items-center space-x-2">
                <IoPersonOutline className="text-gray-500" />
                <span className="text-sm text-gray-600">Name</span>
              </div>
              <span className="text-sm font-medium">{userProfile.name}</span>
            </div>

            <div className="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
              <div className="flex items-center space-x-2">
                <IoMailOutline className="text-gray-500" />
                <span className="text-sm text-gray-600">Email</span>
              </div>
              <span className="text-sm font-medium">{userProfile.email}</span>
            </div>

            <div className="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
              <div className="flex items-center space-x-2">
                <IoCallOutline className="text-gray-500" />
                <span className="text-sm text-gray-600">Phone</span>
              </div>
              <span className="text-sm font-medium">{userProfile.phone}</span>
            </div>

            <div className="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
              <div className="flex items-center space-x-2">
                <IoPersonOutline className="text-gray-500" />
                <span className="text-sm text-gray-600">Bio</span>
              </div>
              <span className="text-sm font-medium">{userProfile.bio}</span>
            </div>

            <button className="w-full mt-4 bg-blue-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
              Edit Profile
            </button>
          </div>
        </div>

        {/* Notifications */}
        <div className="bg-white rounded-xl p-4 shadow-sm">
          <div className="flex items-center justify-between mb-4">
            <div className="flex items-center space-x-3">
              <IoNotificationsOutline className="text-2xl text-blue-600" />
              <span className="font-medium">Notifications</span>
            </div>
            <button
              onClick={() => toggleNotification('main')}
              className={`relative inline-flex h-6 w-11 items-center rounded-full transition-colors ${notifications.enabled ? 'bg-blue-600' : 'bg-gray-200'}`}
            >
              <span
                className={`inline-block h-4 w-4 transform rounded-full bg-white transition-transform ${notifications.enabled ? 'translate-x-6' : 'translate-x-1'}`}
              />
            </button>
          </div>

          {notifications.enabled && (
            <div className="space-y-4">
              <div className="space-y-2">
                <p className="text-sm font-medium text-gray-700">Notification Types</p>
                <div className="flex flex-col space-y-2">
                  {[
                    { key: 'push', label: 'Push Notifications' },
                    { key: 'email', label: 'Email Notifications' },
                    { key: 'inApp', label: 'In-App Notifications' }
                  ].map(type => (
                    <div key={type.key} className="flex items-center justify-between">
                      <span className="text-sm text-gray-600">{type.label}</span>
                      <button
                        onClick={() => toggleNotification(type.key)}
                        className={`relative inline-flex h-5 w-9 items-center rounded-full transition-colors ${notifications[type.key] ? 'bg-blue-600' : 'bg-gray-200'}`}
                      >
                        <span
                          className={`inline-block h-3 w-3 transform rounded-full bg-white transition-transform ${notifications[type.key] ? 'translate-x-5' : 'translate-x-1'}`}
                        />
                      </button>
                    </div>
                  ))}
                </div>
              </div>

              <div className="space-y-2">
                <p className="text-sm font-medium text-gray-700">Content Preferences</p>
                <div className="flex flex-col space-y-2">
                  {[
                    { key: 'news', label: 'News Updates' },
                    { key: 'books', label: 'New Books' },
                    { key: 'updates', label: 'System Updates' }
                  ].map(pref => (
                    <div key={pref.key} className="flex items-center justify-between">
                      <span className="text-sm text-gray-600">{pref.label}</span>
                      <button
                        onClick={() => toggleNotification(`content.${pref.key}`)}
                        className={`relative inline-flex h-5 w-9 items-center rounded-full transition-colors ${notifications.content[pref.key] ? 'bg-blue-600' : 'bg-gray-200'}`}
                      >
                        <span
                          className={`inline-block h-3 w-3 transform rounded-full bg-white transition-transform ${notifications.content[pref.key] ? 'translate-x-5' : 'translate-x-1'}`}
                        />
                      </button>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          )}
        </div>

        {/* Theme Toggle */}
        <div className="bg-white rounded-xl p-4 shadow-sm">
          <div className="flex items-center justify-between">
            <div className="flex items-center space-x-3">
              {darkMode ? <IoMoon className="text-2xl text-blue-600" /> : <IoSunny className="text-2xl text-yellow-500" />}
              <span className="font-medium">Theme Mode</span>
            </div>
            <button
              onClick={toggleTheme}
              className={`relative inline-flex h-6 w-11 items-center rounded-full transition-colors ${darkMode ? 'bg-blue-600' : 'bg-gray-200'}`}
            >
              <span
                className={`inline-block h-4 w-4 transform rounded-full bg-white transition-transform ${darkMode ? 'translate-x-6' : 'translate-x-1'}`}
              />
            </button>
          </div>
        </div>

        {/* Language Selection */}
        <div className="bg-white rounded-xl p-4 shadow-sm">
          <div className="flex items-center space-x-3 mb-4">
            <IoLanguageOutline className="text-2xl text-blue-600" />
            <span className="font-medium">Language</span>
          </div>
          <div className="grid grid-cols-2 gap-3">
            <button
              onClick={() => handleLanguageChange('en')}
              className={`py-2 px-4 rounded-lg text-sm font-medium transition-colors ${language === 'en' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'}`}
            >
              English
            </button>
            <button
              onClick={() => handleLanguageChange('kh')}
              className={`py-2 px-4 rounded-lg text-sm font-medium transition-colors ${language === 'kh' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'}`}
            >
              ខ្មែរ
            </button>
          </div>
        </div>

        {/* Authentication */}
        <div className="bg-white rounded-xl p-4 shadow-sm">
          <div className="flex items-center justify-between">
            <div className="flex items-center space-x-3">
              {isLoggedIn ? 
                <IoLogOutOutline className="text-2xl text-red-600" /> : 
                <IoLogInOutline className="text-2xl text-green-600" />
              }
              <span className="font-medium">{isLoggedIn ? 'Logout' : 'Login'}</span>
            </div>
            <button
              onClick={toggleAuth}
              className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${isLoggedIn ? 'bg-red-600 text-white hover:bg-red-700' : 'bg-green-600 text-white hover:bg-green-700'}`}
            >
              {isLoggedIn ? 'Sign Out' : 'Sign In'}
            </button>
          </div>
        </div>
      </div>

      <Nav />
    </div>
  );
}