# 📑 Documentación del Proyecto – Dashboard Tramex

## 1. Introducción
El proyecto consiste en el desarrollo de un **dispositivo contador de galones de diésel** para la empresa **Tramex**, utilizando un **microcontrolador PIC** y una **Raspberry Pi**.  
El sistema incluye un **Dashboard web** para la administración y monitoreo de clientes, dispositivos y reportes.  

El objetivo es ofrecer a Tramex una herramienta centralizada para:  
- Monitorear consumos de diésel en tiempo real.  
- Gestionar clientes, vehículos y dispositivos.  
- Generar reportes y tickets de soporte.  

---

## 2. Arquitectura del Sistema
- **Hardware**:  
  - **PIC**: encargado de la medición del flujo de diésel (contador de galones).  
  - **Raspberry Pi**: actúa como pasarela de comunicación y servidor del dashboard.  
    - Incluye un **módulo GSM** para conectividad remota.  

- **Software**:  
  - Dashboard Web accesible vía navegador.  
  - Base de datos **MySQL** administrada con **phpMyAdmin**.  
  - Instancia desplegada en **AWS** para asegurar escalabilidad y disponibilidad.  
  - API para la comunicación con dispositivos.  

---

## 3. Roles y Accesos
Existen dos niveles principales de acceso:  

### 🔹 Administrador (Tramex)  
- Accede a todas las secciones del sistema.  
- Puede crear y administrar clientes.  
- Gestiona usuarios internos y externos.  
- Tiene control sobre la sección **Admin** y **Register**.  

### 🔹 Cliente (Usuarios externos)  
- Acceden solo a sus dispositivos, contenedores y vehículos.  
- Pueden ver reportes relacionados con su operación.  
- No tienen acceso a la administración global del sistema.  

---

## 4. Módulos del Dashboard

### 4.1. Clientes  
- Información de clientes de Tramex.  
- Permite registrar nuevos clientes y gestionar datos existentes.  
- Solo visible para administradores.  

### 4.2. Contenedores  
- Vista de los tanques o contenedores de diésel asociados.  
- Información: capacidad, estado actual, ubicación.  
- Clientes ven solo sus propios contenedores.  

### 4.3. Dashboard (Página principal)  
- Resumen general: consumo de diésel, alertas, estado de dispositivos.  
- Visualización en tiempo real de métricas clave.  
- Diferente vista para Admin y Clientes (admin ve global, cliente solo su operación).  

### 4.4. Dispositivos  
- Listado de contadores de galones (PIC + Raspberry).  
- Estado online/offline.  
- Configuración y detalles técnicos.  
- Admin ve todos, cliente solo los suyos.  

### 4.5. Perfil del Usuario  
- Configuración de datos del usuario logueado.  
- Cambio de contraseña.  
- Preferencias de notificación.  

### 4.6. Reportes  
- Generación de reportes de consumo por cliente, contenedor, vehículo o periodo de tiempo.  
- Exportación en PDF/Excel.  
- Clientes solo ven sus propios reportes.  

### 4.7. Tickets  
- Sistema de soporte para incidencias.  
- Admin puede gestionar todos los tickets.  
- Cliente puede abrir tickets propios.  

### 4.8. Usuarios  
- Gestión de usuarios del sistema.  
- Admin puede crear, editar y eliminar usuarios.  
- Clientes no ven esta sección.  

### 4.9. Vehículos  
- Registro de vehículos que consumen diésel.  
- Asociados a un cliente.  
- Monitoreo de consumo por vehículo.  

### 4.10. Register (solo Admin)  
- Creación de nuevos clientes.  
- Asignación de dispositivos y vehículos.  

### 4.11. Admin (solo Admin)  
- Panel de control exclusivo para Tramex.  
- Configuración global del sistema.  
- Control sobre permisos y accesos.  

---

## 5. Seguridad y Sesiones  
- **Autenticación**: mediante usuario y contraseña.  
- **Roles**: Admin vs Cliente.  
- **Visibilidad restringida**:  
  - Admin: todos los datos.  
  - Cliente: solo sus propios dispositivos, contenedores y vehículos.  
- **Sesiones seguras**: token JWT o sesiones cifradas.  

---

## 6. Futuras Extensiones  
- Integración con facturación electrónica.  
- Reportes automáticos enviados por correo.  
- Dashboard móvil.  
- IA para detección de consumos anómalos.  

---

## 7. Infraestructura en la nube  
- **AWS EC2**: instancia para hospedar el dashboard y la base de datos.  
- **phpMyAdmin**: para la administración de la base de datos MySQL.  
- **Módulo GSM** en la Raspberry para enviar datos a la nube.  

