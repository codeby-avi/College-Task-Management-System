# 🏫 College Task Management System (CTMS)
## 🧾 Project Abstract

A comprehensive **role-based task management system** designed for college administration, built with **PHP** and **MySQL**.
---

## 📌 Table of Contents

- [Key Feature](key-features)
- [Core Functionalities](core-functionalities)
- [Demo](#-demo)
- [Project Structure](#-project-structure)
- [Technologies Stack](#-technologies-stack)
- [Installation Guide](#-installation-guide)
- [Authentication System](#-authentication-system)
- [How It Works](#-how-it-works)
- [Real-World Applications](#-real-world-applications)
- [Dashboard Preview](#-dashboard-preview)
- [Deployment](#-deployment)
- [Future Enhancements](#-future-enhancements)
- [Contributing](contributing)
- [Feedback & Support](#-feedback--support)
- [Acknowledgments](#-acknowledgments)
- [References](#-references)
- [License](#-license)

---

## 🌟 Key Features

### 🎓 Principal Dashboard
- Full system oversight
- Task creation and assignment
- User management (add staff/clerk)
- Comprehensive task monitoring

### 🧾 Clerk Dashboard
- Task creation interface
- Task assignment functionality
- Status tracking system

### 👨‍🏫 Staff Dashboard
- Personal task overview
- Progress update tools
- Document submission

---

## 📋 Core Functionalities

### ✅ Task Management
- Create tasks with titles, descriptions, deadlines
- Assign tasks to specific users
- Status tracking (Pending / In Progress / Completed)

### 👥 User System
- Secure role-based authentication
- Profile management
- Contact information storage

### 📁 File Handling
- Upload PDF documents
- Attach files to specific tasks

## 🚀 Demo

🖥️ [Live Demo]() (Project is not Deployed)  


-

## 📂 Project Structure
Re-arrange project structure like below.
```
ctms/
├── dashboards/
│   ├── clerkDashboard.php
│   ├── principalDashboard.php
│   └── staffDashboard.php
├── includes/
│   ├── auth/
│   │   ├── login.php
│   │   └── logout.php
│   ├── tasks/
│   │   ├── addTask.php
│   │   ├── deleteTask.php
│   │   ├── updateStatus.php
│   │   └── checkStatus.php
│   └── users/
│       └── addUser.php
├── assets/
│   ├── css/
│   │   ├── clerkDash.css
│   │   ├── principalDash.css
│   │   └── staffDashboard.css
│   └── js/
│       └── dashboard.js
├── files/                  # Task document storage
└── index.html              # Login portal

```

---

## 🛠️ Technology Stack

### 🖥️ Frontend
- HTML5, CSS3, JavaScript
- Font Awesome icons
- Responsive Design

### 🧠 Backend
- PHP 7.0+
- MySQL 5.7+
- MySQLi for DB operations
---

## 📥 Installation Guide

### 🧰 Requirements
- PHP 7.0+
- MySQL 5.7+
- Apache/Nginx
- Composer (optional)

1. Setup Instructions
```bash 

git clone https://github.com/yourusername/ctms.git
cd ctms
```


2. Create and activate virtual environment:

```bash 

1.Download the source code and extract the zip file.
 2.Download or set up any local web server that runs PHP script.
 3.Open the web-server database and create a new database name it "taskmanager".
 4. Import the SQL file 
 5.Copy and paste the source code to the location where your local web server accessing your local projects. Example for XAMPP('C:\xampp\htdocs')
Open a web browser and browse the project. E.g [http://localhost/ctms]

```

## 🔒 Authentication System

- Session-based login
- Role-specific dashboard redirects
- Secure access control on each page
- User registration by principal only



---

## 💡 How It Works

- 🧑‍🏫 Principal: Manages all users and tasks

- 🧑‍💼 Clerk: Creates and assigns tasks

- 🧑‍🔧 Staff: Views, updates, and uploads work

---


## 🌍 Real-World Applications

- College admin task workflows
- Academic planning
- Inter-departmental coordination
- Faculty workload management

---

## 📊 Dashboard Preview

(Insert real-time dashboard screenshots or preview here)

Here is snapshot of each pages.
- **Login**: 
![Login ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms1.png)

- **Clerk Dashboard**: 
![Sign Up ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms2.png)
![clerkDashboard ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms3.png)
![clerkDashboard ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms4.png)
![clerkDashboard ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms5.png)

- **Principal Dashboard**: 
![principalDashboard ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms6.png)
![principalDashboard ](https://avi-chavan-96.sirv.com/Projects/ctms/ctms7.png)


- **Staff Dashborad**: 
![staffDashboard](https://avi-chavan-96.sirv.com/Projects/ctms/ctms8.png)

![staffDashboard](https://avi-chavan-96.sirv.com/Projects/ctms/ctms9.png)
![staffDashboard](https://avi-chavan-96.sirv.com/Projects/ctms/ctms10.png)

> *(Real screenshot of web-app)*

---

## 🛠️ Deployment

- Yet not Deployed

---


## 🚧 Future Enhancements

- 📧 Email Notifications
- 🗂️ Task Priority System
- 📅 Calendar Integration
- 📱 Mobile Responsive UI
- 📄 PDF Report Generator
- 💬 Commenting on Tasks

---

## 🤝 Contributing

1. Fork the repo
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit (`git commit -m 'Add feature'`)
4. Push (`git push origin feature/new-feature`)
5. Open a Pull Request

---

## 💬 Feedback & Support

- Raise issues via GitHub Issues tab
- Contact developer via [GitHub Profile](https://github.com/codeby-avi/College-Task-Management-System/issues)

---

## 🙏 Acknowledgments

- Mentors and Professors 
- Team Members and Contributors

---

## 📚 References

- [PHP Official Documentationt](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap ](https://getbootstrap.com/)
- [DigitalOcean PHP/MySQL Hosting](https://www.digitalocean.com/community/tutorials/how-to-deploy-a-php-application-with-mysql)
- [Apache/Nginx Configuration for PHP](https://httpd.apache.org/docs/)

---

## 📄 License
This project is licensed under the [MIT License](https://mit-license.org/)

---
