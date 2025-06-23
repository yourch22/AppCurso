<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel
 # AppCurso

Sistema web de gestión de cursos desarrollado con **Laravel 11**.

## 📌 Características

- Registro y login con Laravel Jetstream
- Gestión de usuarios (roles: admin, estudiante)
- Módulo de ciclos académicos y cursos
- Redirección personalizada post-login
- Base de datos con seeder de datos reales

## ⚙️ Tecnologías

- PHP 8.2
- Laravel 11
- MySQL
- Tailwind CSS
- Jetstream + Livewire

## 🚀 Instalación

```bash
git clone https://github.com/tu-usuario/AppCurso.git
cd AppCurso
composer install
cp .env.example .env
php artisan key:generate
