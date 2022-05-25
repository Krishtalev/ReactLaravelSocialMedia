import d from "./Dialogs.module.css"
import DialogItem from "./DialogItem/DialogItem";
import MessageItem from "./MessageItem/MessageItem";
import React from "react";
import barbieImg from "../../Images/pngwing.png";

const Dialogs = (props) => {
	let dialogsItem = props.dialogsData.map(el => <DialogItem id={el.id} name={el.name} src={el.src}key={el.id}/>)
	let messageItem = props.messageData.map(el => <MessageItem message={el.message} key={el.id}/>)
	let newMessageValue = props.newMessageValue;

	let addMessage = () => {
		props.addMessage();
	}
	let onMessageChange = (event) => {
		let text = event.target.value;
		props.onMessageChange(text);
	}

	return (
		<div className={d.wrapper}>
			<div className={d.dialogs}>
				<input className={d.search} placeholder="Search..."/>
				<ul className={d.dialogs_ul}>
					{dialogsItem}
				</ul>
			</div>
			<div className={d.messageWrapper}>
				<div className={d.messageHeader}>
					<div className={d.dialogName}>DialogName</div>
					<img src={barbieImg} alt="" />
				</div> 
				<div className={d.hr}></div>
				<div className={d.messages}>
					{messageItem}
				</div>
				<div className={d.sendMessage}>
					<textarea onChange={onMessageChange} value={newMessageValue} 
						placeholder="Write a message...">
					</textarea>
					<button className={d.bSend} onClick={addMessage}>Send</button>
				</div>
			</div>
		</div>
	)
}

export default Dialogs;