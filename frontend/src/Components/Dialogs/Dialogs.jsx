import d from "./Dialogs.module.css"
import {NavLink} from "react-router-dom";

const activeLink = ({isActive}) => isActive ? d.active : d.item; 

const Dialogs = (props) => {
	return (
		<div>
			{props.text}
			<div className={d.wrapper}>
				<div className={d.dialogs}>
					<ul className={d.dialogs_ul}>
						<li className={d.dialogs_li}>
							<NavLink to="/dialogs" className ={activeLink}>Andrey</NavLink>
						</li>
						<li className={d.dialogs_li}>
							<NavLink to="/dialogs" className ={activeLink}>Dmitry</NavLink>
						</li>
						<li className={d.dialogs_li}>
							<NavLink to="/dialogs" className ={activeLink}>Sasha</NavLink>
						</li>
						<li className={d.dialogs_li}>
							<NavLink to="/dialogs" className ={activeLink}>Sveta</NavLink>
						</li>
					</ul>
				</div>
				<div className={d.mesages}>
					<div className={d.message_item}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, a?</div>
					<div className={d.message_item}>Lorem ipsum dolor sit amet.</div>
					<div className={d.message_item}>Lorem.</div>
					<div className={d.message_item}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo tenetur labore iusto, aut excepturi nulla?</div>
					<div className={d.message_item}>Lorem ipsum dolor sit.</div>
				</div>
			</div>
		</div>
	)
}

export default Dialogs;