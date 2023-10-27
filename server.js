import { createClient } from "redis";
// import { Server } from "socket.io";
import { createAdapter } from "@socket.io/redis-streams-adapter";


import express from 'express';
const app = express();
import { createServer } from 'http';
const server = createServer(app);
import { Server } from "socket.io";
const redisClient = createClient({ url: "redis://localhost:6379" });

await redisClient.connect();
const io = new Server(server, {
  adapter: createAdapter(redisClient),
  cors: {
    origin: '*'
  }
});

let nextVisitorNumber = 1;
const clients = new Set();

app.get('/', (req, res) => {
  res.send('YOU CONNECTED');
});
// redisClient.subscribe('private-counter-add');

/*redisClient.on('message', (channel, message) => {
  const event = JSON.parse(message);

  if (event.event === 'App\\Events\\NewMessage') {
    io.to('counter-add').emit('new-message', event.data.message);
  }
});*/

io.on('connection', (socket) => {
  const id = socket.id;
  socket.on('disconnect', () => {
    clients.delete(id);
    io.emit("online", clients.size);
    io.emit("leave", id);
    console.info(`Socket ${id} has disconnected.`);

  });
  clients.add(id);
  console.info(`Socket ${id} has connected.`);
  if (id) { socket.emit('hi'); }
  io.emit("online", clients.size);
  const serializedSet = [...clients.keys()];
  io.emit("users", serializedSet, id);

  socket.on('chat message', (msg) => {
    io.emit('chat message', msg);
    console.log('message: ' + msg);
  });
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});
