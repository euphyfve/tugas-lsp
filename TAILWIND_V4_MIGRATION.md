# 🔄 Migrasi ke Tailwind CSS v4 (Laravel 12)

## 📚 Sumber Dokumentasi Resmi

Instalasi ini mengikuti dokumentasi resmi:
- **Laravel 12**: https://laravel.com/docs/12.x/vite
- **Tailwind CSS**: https://tailwindcss.com/docs/guides/laravel

## ✅ Instalasi yang BENAR (Tailwind v4 + Laravel 12)

### 1. Install Dependencies
```bash
npm install -D tailwindcss @tailwindcss/vite
```

### 2. Konfigurasi Vite (`vite.config.js`)
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';  // ← Import plugin

export default defineConfig({
    plugins: [
        tailwindcss(),  // ← Tambahkan plugin di sini
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

### 3. File CSS (`resources/css/app.css`)
```css
/* Import Google Fonts first */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

/* Import Tailwind CSS v4 */
@import "tailwindcss";

/* Source directives - memberitahu Tailwind file mana yang perlu di-scan */
@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

/* Custom styles */
@layer base {
    body {
        font-family: 'Inter', sans-serif;
    }
}
```

### 4. Build Assets
```bash
npm run build
# atau untuk development
npm run dev
```

---

## ❌ vs ✅ Perbandingan dengan Tailwind v3

| Aspek | Tailwind v3 (OLD) | Tailwind v4 (NEW - Laravel 12) |
|-------|-------------------|--------------------------------|
| **Package** | `tailwindcss`, `postcss`, `autoprefixer` | `tailwindcss`, `@tailwindcss/vite` |
| **Config File** | `tailwind.config.js` (WAJIB) | TIDAK perlu config file |
| **PostCSS** | `postcss.config.js` (WAJIB) | TIDAK perlu postcss config |
| **CSS Directives** | `@tailwind base/components/utilities` | `@import "tailwindcss"` |
| **Content Scanning** | Di `tailwind.config.js` | `@source` directives di CSS |
| **Vite Plugin** | TIDAK ada | `@tailwindcss/vite` |
| **Setup Complexity** | 3 file config | 2 file (vite.config.js + app.css) |

---

## 🎯 Keuntungan Tailwind v4

### 1. **Lebih Simple**
- ❌ Tidak perlu `tailwind.config.js`
- ❌ Tidak perlu `postcss.config.js`
- ✅ Semua konfigurasi di CSS

### 2. **Lebih Cepat**
- Plugin Vite native lebih cepat dari PostCSS
- Hot reload lebih responsif

### 3. **Lebih Modern**
- Syntax CSS yang lebih standar
- `@import` dan `@source` lebih intuitif
- Terintegrasi langsung dengan Vite

### 4. **Zero Config**
- Default settings sudah optimal
- Tidak perlu setup content paths di JS

---

## 🔧 File yang TIDAK Diperlukan Lagi

Dengan Tailwind v4, file-file ini TIDAK diperlukan:
- ❌ `tailwind.config.js`
- ❌ `postcss.config.js`

Semua sudah ditangani oleh:
- ✅ `vite.config.js` (plugin setup)
- ✅ `resources/css/app.css` (source directives)

---

## 📝 Catatan Penting

### Lint Warnings
Warnings tentang `@source` di IDE adalah **NORMAL**. Ini adalah direktif khusus Tailwind v4 yang diproses saat build time.

```
Unknown at rule @source (severity: warning)
```
**↑ ABAIKAN warning ini - bukan error!**

### Build Success
Jika build berhasil tanpa error, instalasi sudah benar:
```bash
✓ 53 modules transformed.
✓ built in 623ms
```

---

## 🚀 Cara Menjalankan

### Development Mode (dengan hot reload)
```bash
npm run dev
```

### Production Build
```bash
npm run build
```

### Laravel Server
```bash
php artisan serve
```

---

## 📖 Referensi

- **Laravel 12 Vite Docs**: https://laravel.com/docs/12.x/vite
- **Tailwind CSS Laravel Guide**: https://tailwindcss.com/docs/guides/laravel
- **Tailwind v4 Release**: https://tailwindcss.com/blog/tailwindcss-v4-alpha

---

**Updated**: November 2024  
**Framework**: Laravel 12 + Tailwind CSS v4  
**Build Tool**: Vite
