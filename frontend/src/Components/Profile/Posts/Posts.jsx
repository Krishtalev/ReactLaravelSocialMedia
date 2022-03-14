import p from "./Posts.module.css"
import Post from "./Post";
import PostForm from "./PostForm/PostForm";

const Posts = (props) => {
    const getPosts = () => {
        return [
            {"id": 1, "text": "putin"},
            {"id": 2, "text": "hello"},
        ]
    }
    let posts = getPosts().map((element, i) => <Post text={element["text"]}/>)

    return (
        <div className={p.profile_posts}>
            <div className={p.profile_title}>My posts</div>
            <PostForm/>
            {posts}
        </div>
    )
}

export default Posts;