# **📦 StorageHub**  
**A Laravel-based storage management system**  

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)  
![Blade](https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)  
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)  

## **📌 Overview**  
StorageHub is a web application built with **Laravel** and **Blade** for managing storage inventory, tracking items, and organizing storage spaces efficiently.  

### **✨ Key Features**  
✔ **User Authentication** (Register/Login)  
✔ **CRUD Operations** (Create, Read, Update, Delete items)  
✔ **Storage Categories** (Organize items by type/location)  
✔ **Search & Filters** (Quickly find stored items)  
✔ **Responsive UI** (Works on desktop & mobile)  

---

## **🛠 Installation**  
### **Prerequisites**  
- PHP ≥ 8.1  
- Composer  
- MySQL / MariaDB  
- Node.js (for frontend assets)  

### **Setup Steps**  
1. **Clone the repository**  
   ```sh
   git clone https://github.com/YoussefAitBelfadil/StorageHub.git
   cd StorageHub
   ```

2. **Install dependencies**  
   ```sh
   composer install
   npm install
   ```

3. **Configure `.env`**  
   ```sh
   cp .env.example .env
   ```
   - Update database credentials:
     ```ini
     DB_DATABASE=storagehub
     DB_USERNAME=your_db_user
     DB_PASSWORD=your_db_password
     ```

4. **Generate app key & migrate**  
   ```sh
   php artisan key:generate
   php artisan migrate --seed
   ```

5. **Compile assets**  
   ```sh
   npm run dev
   # or for production:
   npm run build
   ```

6. **Run the app**  
   ```sh
   php artisan serve
   ```
   Open: [http://localhost:8000](http://localhost:8000)  

---

## **📂 Project Structure**  
```
StorageHub/
├── app/           # Laravel models, controllers
├── database/      # Migrations & seeders
├── resources/
│   ├── views/     # Blade templates
│   └── css/       # Custom styles
├── routes/        # web.php, api.php
├── public/        # Compiled assets
└── config/        # Laravel configurations
```

---

## **🖥️ Screenshots**  
|[ ![Login Page](https://via.placeholder.com/400x200?text=Login+Page)](https://res.cloudinary.com/dyhlpbmru/image/upload/v1746456535/screencapture-127-0-0-1-8000-login-2025-05-05-15_44_36_tsnsbi.png) |[ ![Dashboard](https://via.placeholder.com/400x200?text=Dashboard)](https://res.cloudinary.com/dyhlpbmru/image/upload/v1746456534/screencapture-127-0-0-1-8000-dashboard-2025-05-05-15_44_15_u2zeib.png) |
|-------------------------------------------------------------------|----------------------------------------------------------------|
| *Login Page*                                                      | *Dashboard*                                                   |

---

## **🤝 Contributing**  
1. Fork the repo  
2. Create a new branch (`git checkout -b feature/your-feature`)  
3. Commit changes (`git commit -m "Add new feature"`)  
4. Push to branch (`git push origin feature/your-feature`)  
5. Open a **Pull Request**  

---

## **📜 License**  
This project is licensed under the **MIT License**.  

---

## **📧 Contact**  
- **Author:** [Youssef Ait Belfadil](https://github.com/YoussefAitBelfadil)  
- **Email:** youssebelfdelf@gmail.com  

---

### **🙏 Thank You!**  
If you find this project useful, give it a ⭐ on GitHub!  
