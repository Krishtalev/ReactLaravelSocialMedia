import './App.css';
import Navigation from "./Components/Navigation/Navigation";
import Header from "./Components/Header/Header";
import Profile from "./Components/Profile/Profile";

const App = () => {
  return (
    <div className="app-wrapper">
        <Header />
        <Profile />
        <Navigation />
    </div>
  );
}

export default App;
