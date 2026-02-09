# 🍽️ Youco'Done

Youco'Done is a web platform that allows users to **book tables in restaurants in just a few clicks**, while providing restaurateurs with a simple and efficient space to **publish, manage, and track reservations**.

This project focuses on building the **functional foundations** of the platform, including authentication, restaurant management, search, and role-based access control.

---

## 🎯 Project Objectives

* Provide a secure authentication system for all users
* Allow restaurant owners to manage their restaurants
* Enable customers to search and book restaurants easily
* Give administrators full control over the platform
* Implement roles and permissions with best practices

---

## 👥 User Roles

* **Customer**: Search restaurants, view details, add favorites, book tables
* **Restaurant Owner**: Create, update, and manage their own restaurants
* **Administrator**: Manage users, restaurants, and platform statistics

---

## 📖 User Stories

### Authentication & Profile

* 🍽️ As a user, I can register and authenticate securely
* 👤 As a user, I can view and edit my personal profile

### Restaurant Owner

* 🏠 Publish a restaurant with full details (name, city, cuisine, capacity, hours, photos, menus)
* 🛠️ Edit or delete my own restaurants

### Customer

* 🔍 Search restaurants by city, cuisine, time slot, or name
* 📄 View restaurant details (menus, photos, reviews, availability)
* ⭐ Add restaurants to favorites

### Administrator

* 🗑️ Delete any restaurant
* 📊 View dashboard statistics (number of active restaurants)
* 👮 Manage roles and permissions

---

## ⚙️ Technical Features

* ✅ Secure authentication using **Laravel Breeze** or **Jetstream**
* ✅ Full **CRUD** for restaurants
* ✅ Advanced search system:

  * City
  * Cuisine type
  * Opening hours
  * Restaurant name
* ✅ User profile management
* ✅ Role & permission management using **Spatie Laravel Permission** or **Gates/Policies**
* ✅ Responsive UI for all roles (Customer / Owner / Admin)

---

## 🔐 Roles & Permissions Rules

* Restaurant owners can **only manage their own restaurants**
* Customers can **only book for themselves**
* Administrators have **full access and control** over the platform

---

## 🛠️ Tech Stack

* **Backend**: Laravel
* **Authentication**: Laravel Breeze / Jetstream
* **Authorization**: Spatie Laravel Permission
* **Database**: MySQL / PostgreSQL
* **Frontend**: Blade + Tailwind CSS

---

## 🚀 Installation

```bash
# Clone the repository
git clone https://github.com/your-username/youcodone.git

# Install dependencies
composer install
npm install && npm run dev

# Environment setup
cp .env.example .env
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start the server
php artisan serve
```

---

## 📊 Admin Dashboard

The admin dashboard displays:

* Total number of active restaurants
* User management access
* Restaurant moderation tools

---

## 📌 Project Constraints

⚠️ Any non-compliance with the specifications or delay in delivery on **Simplonline** will automatically invalidate all skills related to this brief.

---

## ✨ Future Improvements

* Online table booking with time slots
* Reviews and ratings system
* Notifications (email / in-app)
* Payment integration

---

## 📄 License

This project is for educational purposes only.