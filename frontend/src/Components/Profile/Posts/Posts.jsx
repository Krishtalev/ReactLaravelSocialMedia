import p from "./Posts.module.css"
import Post from "./Post";

const Posts = (props) => {
	return (
		<div className={p.profile_posts}>
			<div className={p.profile_title}>My posts</div>
			<div className={p.profile_new_post}>
				New post
			</div>
			<Post text="lalallalalala"/>
			<Post text="pmupumpumpumu"/>
			<Post text="blbla"/>
		</div>
	)
}

export default Posts;