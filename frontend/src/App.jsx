import {BrowserRouter, Routes, Route} from "react-router-dom";
import './App.css';
import Sidebar from "./Components/Sidebar/Sidebar";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";
import Dialogs from "./Components/Dialogs/Dialogs";
import Messages from "./Components/Messages/Messages";

const App = (props) => {
	debugger;
	return (
		<BrowserRouter>
		<div className="app-wrapper">	
			<Header />
			<Sidebar />
			<div className="app-wrapper-content">
				<Routes>
					<Route path="/profile" element={<Profile posts={props.posts}/>} /> 
					<Route path="/dialogs" element={<Dialogs text="dialogs" dialogsData={props.dialogsData}/>} /> 
					<Route path="/dialogs/*" element={<Messages text="dialogs" messages={props.messages}/>} />
					<Route path="/news" element={<Dialogs text="news" dialogsData={props.dialogsData}/>} />
					<Route path="/music" element={<Dialogs text="music" dialogsData={props.dialogsData}/>} /> 
					<Route path="/settings" element={<Dialogs text="settings" dialogsData={props.dialogsData}/>} /> 
				</Routes>
			</div>
		</div>
		</BrowserRouter>
	);
}

export default App;
