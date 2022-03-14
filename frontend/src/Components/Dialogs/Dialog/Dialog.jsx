import style from "./Dialog.module.css"
import {NavLink} from "react-router-dom";

const Dialog = (props) => {
	return (
		<div className={style.dialog}>
			<img
				src={props.src}
				alt="img"/>
			<div className={style.groupName}>
				<NavLink to={props.id}>{props.name}</NavLink>
			</div>
		</div>)
}

export default Dialog

