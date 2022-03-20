import Posts from "./Posts/Posts";
import p from "./Profile.module.css"
import ProfileInfo from "./ProfileInfo";

const Profile = (props) => {
    const request = new Request("http://localhost:8080/api", {
        method: "get",
        headers: {
            Accept: "application/json, text/plain, */*",
            "Content-Type": "application/json"
        }
    });

    fetch(request)
        .then(res => {
            if (res.status === 200) {
                console.log("yey jojo")
            }
        })

    return (
        <div>
            <section className={p.content}>
                <img className={p.back_img}
                     src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"
                     alt="back-img">
                </img>
                <div className={p.profile_wrapper}>
                    <div className={p.profile}>
                        <ProfileInfo/>
                    </div>
                </div>
            </section>
            <Posts posts={props.posts}/>
        </div>
    )
}

export default Profile;