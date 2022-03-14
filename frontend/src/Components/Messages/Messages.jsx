import style from "./Messages.module.css"
import DialogHeader from "./DialogHeader/DialogHeader";


const Messages = (props) => {

    const getMessages = (id) => {
        return [
            {"id": 0, "message": "Hi"},
            {"id": 1, "message": "World"},
        ]
    }

    let url = window.location.pathname;
    let id = url.substring(url.lastIndexOf('/') + 1);
    let messages = getMessages(id)

    return (
        <div className={style.wrapper}>
            <img className={style.back_img}
                 src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"
                 alt="back-img"/>
            <DialogHeader imgSrc="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"/>

            <div className={style.dialogs}>
                {messages.map((element, i) => <div className="busterCards" key={i}>{element["message"]}</div>)}
            </div>
        </div>
    )
}

export default Messages;