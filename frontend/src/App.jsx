import {BrowserRouter, Routes, Route} from "react-router-dom";
import './App.css';
import Sidebar from "./Components/Sidebar/Sidebar";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";
import Friends from "./Components/Friends/Friends";
import DialogsContainer from "./Components/Dialogs/DialogsContainer";

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
						element={<Friends friendPage={props.state.friendPage} />}
					/>
				</Routes>
			</div>
		</div>
		</BrowserRouter>
	);
}

export default App;
