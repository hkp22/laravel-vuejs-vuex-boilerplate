import home from "./home/routes";
import auth from "./auth/routes";
import timeline from "./timeline/routes";
import errors from "./errors/routes";

export default [...home, ...auth, ...timeline, ...errors];
