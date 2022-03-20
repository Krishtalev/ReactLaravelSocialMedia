import style from "./Messages.module.css"
import DialogHeader from "./DialogHeader/DialogHeader";

const Messages = (props) => {
	let messages = props.messages.map(element => element.message);

	return (
        <div className={style.wrapper}>
            <img className={style.back_img}
                 src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"
                 alt="back-img"
			/>
            <DialogHeader imgSrc="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"/>

            <div className={style.dialogs}>
                {messages}
            </div>
        </div>
    )
}

export default Messages;