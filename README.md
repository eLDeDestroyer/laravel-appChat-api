# 💬 Real-time Chat App with PHP Laravel + WebSocket

A real-time chat application built using **Laravel** and **WebSocket** to enable instant messaging between users.

## 🚀 Tech Stack

- **Laravel** — PHP web application framework
- **Laravel WebSockets** — Real-time communication powered by WebSocket
- **MySQL** — Relational database

---

## ✨ Features

- ✅ Real-time Chat (WebSocket)
- ✅ Register & Login with JWT
- ✅ Add, Update, and Delete Friends
- ✅ Send & Delete Chat Messages
- ✅ Get User Information

---

## 🗂️ Project Overview

🧭 **ERD Visual Link**  
[View on DrawSQL](https://drawsql.app/teams/devmare/diagrams/web-chat)

🌱 **SQL Seeder File**  
[View Seeder on GitHub](https://github.com/eLDeDestroyer/golang-appChat-api/blob/main/files/app_chat%20.sql)

---


## 🔐 AUTHENTICATION

### 🔸 Register

- **URL**: `POST http://localhost:3000/api/users/register`

#### 🟦 Request:
```json
{
  "username": "sacho",
  "password": "12345678"
}
```

#### 🟩 Response:
```json
{
  "data": {
    "username": "sacho",
    "token": "<JWT_TOKEN>"
  },
  "message": "Success Register",
  "success": true
}
```

---

### 🔸 Login

- **URL**: `POST http://localhost:3000/api/users/login`

#### 🟦 Request:
```json
{
  "username": "sacho",
  "password": "12345678"
}
```

#### 🟩 Response:
```json
{
  "data": {
    "username": "sacho",
    "token": "<JWT_TOKEN>"
  },
  "message": "Success Login",
  "success": true
}
```

---

## 👤 USER

### 🔸 Update User

- **URL**: `PATCH http://localhost:3000/api/auth/users/update`

#### 🟦 Request:
```json
{
  "name": "jadon",
  "username": "sacho"
}
```

#### 🟩 Response:
```json
{
  "data": true,
  "message": "Success UpdateUser",
  "success": true
}
```

---

### 🔸 Get Current User

- **URL**: `GET http://localhost:3000/api/auth/users/me`

#### 🟩 Response:
```json
{
  "data": {
    "id": 1,
    "unique_number": 50417333,
    "name": "jadon",
    "username": "sacho",
    "password": "",
    "last_login": null
  },
  "message": "Success Get User",
  "success": true
}
```

---

## 👥 FRIEND

### 🔸 Get Friend by ID

- **URL**: `GET http://localhost:3000/api/auth/friend/13`

#### 🟩 Response:
```json
{
  "data": {
    "id": 13,
    "name": "maryy konco plek",
    "friend": 2,
    "user_id": 1,
    "room_id": 9
  },
  "message": "success get friend data",
  "success": true
}
```

---

### 🔸 Add Friend

- **URL**: `POST http://localhost:3000/api/auth/friend/add`

#### 🟦 Request:
```json
{
  "name": "maryy konco plek",
  "unique_number": 99596897
}
```

#### 🟩 Response:
```json
{
  "data": 200,
  "message": "success add friend user",
  "success": true
}
```

---

### 🔸 Update Friend

- **URL**: `PATCH http://localhost:3000/api/auth/friend/update/1`

#### 🟦 Request:
```json
{
  "name": "mary sigma"
}
```

#### 🟩 Response:
```json
{
  "data": 200,
  "message": "success update friend user",
  "success": true
}
```

---

### 🔸 Delete Friend

- **URL**: `DELETE http://localhost:3000/api/auth/friend/delete`

#### 🟦 Request:
```json
{
  "id": 1
}
```

---

### 🔸 Get All Friends

- **URL**: `GET http://localhost:3000/api/auth/friends`

#### 🟩 Response:
```json
{
  "data": [
    {
      "id": 13,
      "room_id": 9,
      "name": "maryy konco plek",
      "unique_number": 99596897
    }
  ],
  "message": "success get friends user",
  "success": true
}
```

---

## 💬 CHAT

### 🔸 Get Chats by Room ID

- **URL**: `GET http://localhost:3000/api/auth/chats/4`

#### 🟩 Response:
```json
{
  "data": [
    {
      "id": 21,
      "chat": "test",
      "room_id": 9,
      "user_id": 1
    }
  ],
  "message": "success",
  "success": true
}
```

---

### 🔸 Send Chat Message

- **URL**: `POST http://localhost:3000/api/auth/chats/add`

#### 🟦 Request:
```json
{
  "room_id": 9,
  "chat": "test"
}
```

#### 🟩 Response:
```json
{
  "data": {
    "id": 21,
    "chat": "test",
    "room_id": 9,
    "user_id": 1
  },
  "message": "success",
  "success": true
}
```

---

### 🔸 Delete Chat

- **URL**: `DELETE http://localhost:3000/api/auth/chats/delete/1`

#### 🟩 Response:
```json
{
  "data": null,
  "message": "success",
  "success": true
}
```

---

## 🔌 WEBSOCKET

### Connect via WebSocket

- **URL**:
```
ws://localhost:3000/ws/chat?room_id=8
```
