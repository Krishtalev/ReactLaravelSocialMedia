import NavOption from "./NavOption/NavOption";
import style from "./Navigation.module.css"

const Navigation = () => {
    return (
        <footer className={style.homepageNav}>
            <NavOption link="s" text="Friends"/>
            <NavOption link="s" text="Messages"/>
            <NavOption link="s" text="News"/>
            <NavOption link="s" text="Settings"/>
        </footer>
    )
}

export default Navigation;