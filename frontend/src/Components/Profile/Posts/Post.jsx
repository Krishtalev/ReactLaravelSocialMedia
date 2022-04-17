import { addLikeActionCreator } from "../../../redux/reducers/profile-reducer";
import s from "./Posts.module.css"

const Post = (props) => {
	let addLike = () => {
		props.dispatch(addLikeActionCreator(props.id));
	}

	return (
		<div className={s.profile_post}>
			<div className={s.post_wrapper}>
				<div className={s.author}>
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQblpU20ze2Vsusvi7MmRwzZYanB0cVwNJHg&usqp=CAU" alt="ava" />
					<div className={s.authorName}>{props.name}</div>
				</div>
				
				<div className={s.post_text}>{props.text}</div>
			</div>
			<button className={s.bLike} onClick={addLike}>like</button> <span className={s.likesCount}>{props.numOfLike}</span>
		</div>
	)
}

export default Post;