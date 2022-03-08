import p from "./Posts.module.css"

const Post = (props) => {
	return (
		<div className={p.profile_post}>
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQblpU20ze2Vsusvi7MmRwzZYanB0cVwNJHg&usqp=CAU" alt="ava" />
			{props.text}
		</div>
	)
}

export default Post;