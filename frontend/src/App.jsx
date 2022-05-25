import {BrowserRouter, Routes, Route} from "react-router-dom";
import './App.css';
import Sidebar from "./Components/Sidebar/Sidebar";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";
import DialogsContainer from "./Components/Dialogs/DialogsContainer";
import FriendsContainer from "./Components/Friends/FriendsContainer";
import UsersContainer from "./Components/Users/UsersContainer";

const App = (props) => {
	return (
		<BrowserRouter>
		<div className="app-wrapper">	
			<Header />
			<Sidebar />
			<div className="app-wrapper-content">
				<Routes>
					<Route path="/profile" 
						element={ <Profile store={props.store} /> } 
					/> 
					<Route path="/dialogs/*" 
						element={<DialogsContainer store={props.store} />}  
					/>
					<Route path="/friends" 
						element={<FriendsContainer store={props.store} />}
					/>
					<Route path="/users" 
						element={<UsersContainer store={props.store} />}
					/>
				</Routes>
			</div>
		</div>
		</BrowserRouter>
	);
}

export default App;
