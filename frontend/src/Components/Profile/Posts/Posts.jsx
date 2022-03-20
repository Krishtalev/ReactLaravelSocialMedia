import p from "./Posts.module.css"
import Post from "./Post";
import PostForm from "./PostForm/PostForm";

const Posts = (props) => {
    let posts = props.posts.map(element => <Post text={element.text}/>)

    return (
        <div className={p.profile_posts}>
            <div className={p.profile_title}>My posts</div>
            <PostForm/>
            {posts}
        </div>
    )
}

export default Posts;