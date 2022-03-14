import style from "./DialogHeader.module.css";
import {useNavigate} from "react-router-dom";

const DialogHeader = (props) => {
    const navigate = useNavigate();

    return(
        <div className={style.dialogHeader}>
            <button className={style.backButton} onClick={() => navigate('/dialogs', { replace: true })}></button>
            <div className={style.dialogInfo}>
                <img className={style.dialogImg} src={props.imgSrc} alt="dialogImg"/>
                <span className={style.dialogName}>DialogName</span>
            </div>
        </div>
    )
}

export default DialogHeader