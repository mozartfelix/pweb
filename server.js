const express = require('express');
const bodyParser = require('body-parser');
const jwt = require('jsonwebtoken');
const path = require('path');

const app = express();
const port = 3000;
const secretKey = 'yourSecretKey'; // Replace with a secure secret key

app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));

const users = [];

const authenticateJWT = (req, res, next) => {
  const token = req.header('Authorization');

  if (!token) {
    return res.status(401).json({ success: false, message: 'Unauthorized: No token provided.' });
  }

  jwt.verify(token, secretKey, (err, user) => {
    if (err) {
      return res.status(403).json({ success: false, message: 'Unauthorized: Invalid token.' });
    }

    req.user = user;
    next();
  });
};

app.post('/signup', (req, res) => {
  const { username, email, password } = req.body;

  if (!username || !email || !password) {
    return res.status(400).json({ success: false, message: 'Please provide all required fields.' });
  }

  if (users.some((user) => user.username === username || user.email === email)) {
    return res.status(400).json({ success: false, message: 'Username or email is already taken.' });
  }

  users.push({ username, email, password });

  const token = jwt.sign({ username, email }, secretKey, { expiresIn: '30 days' });

  return res.status(201).json({ success: true, message: 'User registered successfully.', token });
});

app.post('/login', (req, res) => {
  const { username, password } = req.body;

  const user = users.find((u) => u.username === username && u.password === password);

  if (!user) {
    return res.status(401).json({ success: false, message: 'Invalid username or password.' });
  }

  const loginToken = jwt.sign({ username: user.username, email: user.email }, secretKey, { expiresIn: '2 minutes' });

  return res.json({ success: true, message: 'Login successful.', token: loginToken });
});

app.get('/users', authenticateJWT, (req, res) => {
  res.json({ success: true, user: req.user });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
