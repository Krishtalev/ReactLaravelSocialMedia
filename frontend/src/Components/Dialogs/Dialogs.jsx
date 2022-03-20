import style from "./Dialogs.module.css"
import Dialog from "./Dialog/Dialog";

const Dialogs = (props) => {
	let dialogsItem = props.dialogsData.map(el => <Dialog src={el.src} id={el.id} name={el.name} />)

	return (
		<div className={style.wrapper}>
			<img className={style.back_img}
				 src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="back-img"/>
			<div className={style.dialogs}>
				{dialogsItem}
			</div>
		</div>
	)
}

export default Dialogs;