import {BrowserRouter, Routes, Route} from "react-router-dom";
import './App.css';
import Sidebar from "./Components/Sidebar/Sidebar";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";
import Dialogs from "./Components/Dialogs/Dialogs";
import Friends from "./Components/Friends/Friends";

const App = (props) => {
	return (
		<BrowserRouter>
		<div className="app-wrapper">	
			<Header />
			<Sidebar />
			<div className="app-wrapper-content">
				<Routes>
					<Route path="/profile" 
						element={<Profile profilePage={props.state.profilePage} dispatch={props.dispatch}/> } 
					/> 
					<Route path="/dialogs/*" 
						element={<Dialogs dialogPage={props.state.dialogPage} dispatch={props.dispatch}/>} 
					/>
					<Route path="/friends" 
						element={<Friends friendPage={props.state.friendPage} />}
					/>
				</Routes>
			</div>
		</div>
		</BrowserRouter>
	);
}

export default App;
