import  style from "./NavOption.module.css"

const NavOption = (props) => {
    return (
        <div className={style.NavOption}>
            <a href={props.link}>{props.text}</a>
        </div>
    )
}

export default NavOption;