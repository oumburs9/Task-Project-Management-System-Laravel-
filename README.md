
```md
# 📝 Task & Project Management System (Laravel)

A **Laravel-based Task Management System** with:
- ✅ Task creation, editing, deletion, and reordering with **drag-and-drop**
- ✅ Project creation, editing, and deletion
- ✅ Filtering tasks by priority and project

---

## 🚀 Setup Instructions

### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/oumburs9/Task-Project-Management-System-Laravel-.git
cd Task-Project-Management-System-Laravel-
```

### **2️⃣ Install Dependencies**
```sh
composer install
npm install && npm run dev  # If using frontend assets
```

### **3️⃣ Configure Environment**
Copy the `.env.example` file to `.env`:
```sh
cp .env.example .env
```
Generate the application key:
```sh
php artisan key:generate
```
Update your `.env` file with **database credentials**:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🗃️ Database Setup

### **4️⃣ Run Migrations**
```sh
php artisan migrate
```
If you want to seed some test data:
```sh
php artisan db:seed
```

---

## 🏃 Running the Application

### **5️⃣ Start the Server**
```sh
php artisan serve
```
Visit **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.

---

## 🌎 Deployment Instructions

### **🔹 On a Web Server (Apache/Nginx)**
1. **Upload all project files to your server.**
2. **Set correct file permissions:**
   ```sh
   chmod -R 775 storage bootstrap/cache
   ```
3. **Install dependencies:**
   ```sh
   composer install --no-dev --optimize-autoloader
   ```
4. **Configure `.env` file with production database settings.**
5. **Run migrations:**
   ```sh
   php artisan migrate --force
   ```
6. **Set up your web server:**
   - For Apache, update `.htaccess`:
     ```apache
     <IfModule mod_rewrite.c>
         RewriteEngine On
         RewriteRule ^(.*)$ public/$1 [L]
     </IfModule>
     ```
   - For Nginx, use:
     ```nginx
     location / {
         try_files $uri $uri/ /index.php?$query_string;
     }
     ```

7. **Run Queue Workers (If needed)**
   ```sh
   php artisan queue:work --daemon
   ```

8. **Generate Cache (Optional)**
   ```sh
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

9. **Ensure the App is Running!**

---

## 📌 Additional Commands

### **Clear Cache**
```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### **Seed Dummy Data**
```sh
php artisan db:seed
```

### **Run Tests**
```sh
php artisan test
```

---

## 📜 License
This project is licensed under the MIT License.

---

### 🎯 **Happy Coding! 🚀**S
