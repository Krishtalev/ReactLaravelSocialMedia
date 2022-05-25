import s from "./DialogItem.module.css"
import {NavLink} from "react-router-dom";

const activeLink = ({isActive}) => isActive ? s.active : s.item; 

const DialogItem = (props) => {
	let path = "/dialogs/" + props.id;
	debugger;

	return (
		<li className={s.dialogs_li}>
			<NavLink to={path} className={activeLink}>
				<div className={s.dialogItem}>
					<img src={props.src} alt="ava" />
					{props.name}
				</div>
			</NavLink> 
		</li>
	)
}

export default DialogItem;