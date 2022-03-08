import {BrowserRouter, Routes, Route} from "react-router-dom";
import './App.css';
import Sidebar from "./Components/Sidebar/Sidebar";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";
import Dialogs from "./Components/Dialogs/Dialogs";

const App = () => {
	return (
		<BrowserRouter>
		<div className="app-wrapper">	
			<Header />
			<Sidebar />
			<div className="app-wrapper-content">
				<Routes>
					<Route path="/profile" element={<Profile />} /> 
					<Route path="/dialogs" element={<Dialogs text="dialogs"/>} /> 
					<Route path="/news" element={<Dialogs text="news"/>} /> 
					<Route path="/music" element={<Dialogs text="music"/>} /> 
					<Route path="/settings" element={<Dialogs text="settings"/>} /> 
				</Routes>
			</div>
		</div>
		</BrowserRouter>
	);
}

export default App;
