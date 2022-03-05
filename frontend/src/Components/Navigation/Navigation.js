import NavOption from "./NavOption/NavOption";
import style from "./Navigation.module.css"

const Navigation = () => {
    let route = 'http://localhost:8000/api'
    console.log("changed")
    fetch(route).then(response => response.json())
        .then(data => console.log(data));
    return (
        <footer className={style.homepageNav}>
            <NavOption link="s" text="Friendss"/>
            <NavOption link="s" text="Messages"/>
            <NavOption link="s" text="News"/>
            <NavOption link="s" text="Settings"/>
        </footer>
    )
}

export default Navigation;