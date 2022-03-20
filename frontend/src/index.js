import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import barbieImg from "./Images/pngwing.png";

let dialogsData = [
	{src:barbieImg, id:1, name:"Ivan"},
	{src:barbieImg, id:2, name:"Animechniki"}
]

const getMessages = (id) => {
	return [
		{id: 0, message: "Hi"},
		{id: 1, message: "World"},
	]
}
let url = window.location.pathname;
let id = url.substring(url.lastIndexOf('/') + 1);
let messages = getMessages(id)

const getPosts = () => {
	return [
		{id: 1, text: "putin"},
		{id: 2, text: "hello"},
	]
}
let posts = getPosts()

ReactDOM.render(
  <React.StrictMode>
    <App dialogsData={dialogsData} messages={messages} posts={posts}/>
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
