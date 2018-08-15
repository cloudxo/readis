💚 Passed | 💔 Error | 💔 Failure | 🧡 Warning | 💛 Risky | 💙 Incomplete | 💜 Skipped

# Test suite: /Users/hollodotme/Sites/hollodotme/readis/tests

* Environment: `Development`  
* Base namespace: `hollodotme\Readis\Tests`  

## Integration\Application\ReadModel\QueryHandlers\FetchKeyInformationQueryHandlerTest

- [x] Can Fetch Key Information (💚 16)
- [x] Result Fails If Key Is Unknown (💚 1)
- [x] Result Fails If Connection To Server Failed (💚 1)
- [x] Can Use Custom Prettifiers (💚 1)

---

## Integration\Application\ReadModel\QueryHandlers\FetchServerInformationQueryHandlerTest

- [x] Can Fetch Server Information (💚 1)
- [x] Result Fails If Connection To Server Failed (💚 1)

---

## Integration\Application\ReadModel\QueryHandlers\FindKeysInDatabaseQueryHandlerTest

- [x] Can Find Keys In Database (💚 6)
- [x] Result Fails If Connection To Server Failed (💚 1)

---

## Integration\EnvTest

- [x] Can Get Server Manager For Server Key (💚 1)

---

## Integration\Infrastructure\Redis\ServerManagerTest

- [x] Can Construct From Server Connection (💚 1)
- [x] Throws Exception If Connection Fails (💚 1)
- [x] Can Get Value For Key (💚 1)
- [x] Can Get Server Config (💚 1)
- [x] Can Get Slow Log Entries (💚 1)
- [x] Can Get Server Info (💚 1)
- [x] Can Get Key Info Object (💚 1)
- [x] Can Get Key Info Objects (💚 1)
- [x] Can Get Hash Value (💚 1)
- [x] Can Check If Command Exists (💚 1)

---

## Unit\AbstractObjectPoolTest

- [x] Can Get Shared Instance (💚 1)

---

## Unit\Application\Configs\AppConfigTest

- [x] Can Get Base Url (💚 4)
- [x] Can Get Base Uri (💚 4)
- [x] Throws Exception If Application Config Was Not Found (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\HashKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\HashSubKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Build Key Data Throws Exception For Not Existing Sub Key (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\KeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Build Key Data Throws Exception For Unknown Key Type (💚 1)
- [x] Can Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\ListKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\ListSubKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Build Key Data Throws Exception For Not Existing Sub Key (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\SetKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\SetSubKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Build Key Data Throws Exception For Not Existing Sub Key (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\SortedSetKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\SortedSetSubKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Build Key Data Throws Exception For Not Existing Sub Key (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\KeyDataBuilders\StringKeyDataBuilderTest

- [x] Build Key Data (💚 1)
- [x] Can Build Key Data (💚 1)
- [x] Can Not Build Key Data (💚 1)

---

## Unit\Application\ReadModel\Prettifiers\CustomPrettifiersTest

- [x] Add Prettifiers (💚 1)
- [x] Can Prettify Returns False If No Prettifiers Were Added (💚 1)
- [x] Prettify (💚 3)

---

## Unit\Application\ReadModel\Prettifiers\HyperLogLogPrettifierTest

- [x] Can Prettify (💚 2)
- [x] Can Get Prettified Value (💚 2)

---

## Unit\Application\ReadModel\Prettifiers\JsonPrettifierTest

- [x] Can Prettify Json String (💚 5)

---

## Unit\Application\ReadModel\Prettifiers\PrettifierChainTest

- [x] Can Prettify Strings (💚 4)

---

## Unit\Application\Web\Responses\EventSourceStreamTest

- [x] Ending Non Active Stream Throws Exception (💚 1)
- [x] Streaming An Event On Non Active Stream Throws Exception (💚 1)

---

## Unit\EnvTest

- [x] Can Get App Config (💚 1)
- [x] Can Get Server Config List (💚 1)
- [x] Can Get Server Manager (💚 1)

---

## Unit\Infrastructure\Configs\IceHawkDelegateTest

- [x] Can Set Up Error Handling (💚 1)

---

## Unit\Infrastructure\Configs\ServerConfigListTest

- [x] Can Get Server Config For Key (💚 1)
- [x] Can Get Server Congigs (💚 1)
- [x] Throws Exception If No Servers Were Configured (💚 1)
- [x] Throws Exception For Unknown Server Key (💚 1)
- [x] Throws Exception If Servers Config File Not Found (💚 1)

---

## Unit\Infrastructure\Redis\ServerConnectionTest

- [x] Can Construct From Server Config (💚 1)

---

## Unit\Infrastructure\Redis\ServerManagerTest

- [x] Get All Sorted Set Members (💚 1)
- [x] Get All Sorted Set Members Throws Exception If Key Does Not Exist (💚 1)
- [x] Get List Element (💚 1)
- [x] Get List Element Throws Exception If Key Does Not Exist (💚 1)
- [x] Get All Hash Values (💚 1)
- [x] Get All Hash Values Throws Exception If Key Does Not Exist (💚 1)
- [x] Get All List Elements (💚 1)
- [x] Get All List Elements Throws Exception If Key Does Not Exist (💚 1)
- [x] Get Server Config (💚 1)
- [x] Can Get Fallback Server Config If Config Command Is Disabled (💚 1)
- [x] Command Exists (💚 1)
- [x] Get Server Info (💚 1)
- [x] Can Get Fallback Server Info If Info Command Is Disabled (💚 1)
- [x] Get Slow Log Count (💚 1)
- [x] Can Get Fallback Slow Log Count If Slowlog Command Is Disabled (💚 1)
- [x] Select Database (💚 1)
- [x] Get Set Member (💚 1)
- [x] Get Set Member Throws Exception If No Member Was Found At Index (💚 1)
- [x] Get Slow Log Entries (💚 1)
- [x] Can Get Fallback Slow Log Entries If Slowlog Command Is Disabled (💚 1)
- [x] Get Key Info Object For Keys Of Type String (💚 1)
- [x] Get Key Info Object For Keys Of Type Hash (💚 1)
- [x] Get Key Info Object For Keys Of Type List (💚 1)
- [x] Get Key Info Object For Keys Of Type Set (💚 1)
- [x] Get Key Info Object For Keys Of Type Sorted Set (💚 1)
- [x] Get Hash Value (💚 1)
- [x] Get Hash Value Throws Exception For Not Existing Field (💚 1)
- [x] Get Keys (💚 1)
- [x] Get Value (💚 1)
- [x] Get Value Throws Exception If Key Does Not Exist (💚 1)
- [x] Get Key Info Objects (💚 1)
- [x] Get All Set Members (💚 1)
- [x] Get All Set Members Throws Exception If Key Not Found (💚 1)

---

Report created at 2018-08-15 09:05:55 (UTC)