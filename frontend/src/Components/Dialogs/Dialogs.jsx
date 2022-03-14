import style from "./Dialogs.module.css"
import barbieImg from "../../Images/pngwing.png";
import Dialog from "./Dialog/Dialog";

const Dialogs = (props) => {

	let dialogItems = [
		{src:barbieImg,"id": 1, name:"Ivan"},
		{src:barbieImg,"id": 2, name:"Animechniki"}
	]

	return (
		<div className={style.wrapper}>
			<img className={style.back_img}
				 src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="back-img"/>
			<div className={style.dialogs}>
				<Dialog
					src={barbieImg}
					id="1"
					name="Ivan"/>
				<Dialog
					src={barbieImg}
					id="2"
					name="Animechniki"/>
			</div>
		</div>
	)
}

export default Dialogs;