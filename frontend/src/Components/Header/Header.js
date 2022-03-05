import logo from '../../Images/logo.svg';
import style from "./Header.module.css"

const Header = () => {
    return (
        <header className={style.homepageHeader}>
            <h1> Crash </h1>
            <img src={logo} className={style.appLogo} alt="logo" />
        </header>
    )
}

export default Header;