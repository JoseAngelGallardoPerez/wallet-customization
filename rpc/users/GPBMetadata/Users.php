<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: users.proto

namespace GPBMetadata;

class Users
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(hex2bin(
            "0aa5200a0b75736572732e70726f746f121376656c6d69652e77616c6c65742e75736572732282020a0455736572120b0a03554944180120012809120d0a05456d61696c18022001280912100a08557365726e616d6518032001280912110a0946697273744e616d6518042001280912100a084c6173744e616d6518052001280912100a08526f6c654e616d65180620012809120f0a0747726f7570496418072001280412130a0b50686f6e654e756d62657218082001280912130a0b436f6d70616e794e616d65180920012809121c0a1441646d696e6973747261746f72436c6173734964180a2001280312160a0e536d7350686f6e654e756d626572180b2001280912110a09506172656e74554944180c2001280912110a09436f6d70616e794944180d2001280422bf010a0752657175657374120b0a0355494418012001280912130a0b416363657373546f6b656e18022001280912100a08757365726e616d6518032001280912100a08726f6c654e616d65180420012809120c0a0455494473180520032809120f0a0747726f75704964180620012804120f0a07436c617373496418072001280412140a0c546d7041757468546f6b656e18082001280912110a09506172656e7455494418092001280912150a0d536561726368436f6c756d6e73180a200328092288010a08526573706f6e736512270a047573657218022001280b32192e76656c6d69652e77616c6c65742e75736572732e5573657212280a05757365727318032003280b32192e76656c6d69652e77616c6c65742e75736572732e5573657212290a056572726f7218042001280b321a2e76656c6d69652e77616c6c65742e75736572732e4572726f72226a0a06446576696365120a0a024944180120012809120b0a0350696e18022001280912110a0950757368546f6b656e180320012809120e0a064f735479706518042001280912110a0943726561746564417418052001280912110a09557064617465644174180620012809221d0a0e4465766963657352657175657374120b0a035549441801200128092297010a0f44657669636573526573706f6e7365122b0a0664657669636518012001280b321b2e76656c6d69652e77616c6c65742e75736572732e446576696365122c0a076465766963657318022003280b321b2e76656c6d69652e77616c6c65742e75736572732e44657669636512290a056572726f7218032001280b321a2e76656c6d69652e77616c6c65742e75736572732e4572726f7222270a054572726f72120d0a057469746c65180120012809120f0a0764657461696c7318022001280922360a165265717565737446756c6c5573657273427955494473120c0a0455494473180120032809120e0a066669656c647318022003280922460a1146756c6c5573657273526573706f6e736512310a0a66756c6c5f757365727318012003280b321d2e76656c6d69652e77616c6c65742e75736572732e46756c6c55736572228c040a0846756c6c55736572120b0a03756964180120012809120d0a05656d61696c18022001280912100a08757365726e616d6518032001280912100a0870617373776f726418042001280912120a0a66697273745f6e616d6518052001280912110a096c6173745f6e616d6518062001280912140a0c70686f6e655f6e756d62657218072001280912140a0c69735f636f72706f7261746518082001280812110a09726f6c655f6e616d65180920012809120e0a06737461747573180a2001280912150a0d757365725f67726f75705f6964180b2001280412120a0a637265617465645f6174180c2001280912360a0c757365725f64657461696c73180d2001280b32202e76656c6d69652e77616c6c65742e75736572732e5573657244657461696c73123c0a0f706879736963616c5f616472657373180e2001280b32232e76656c6d69652e77616c6c65742e75736572732e506879736963616c416472657373123e0a1062656e6966696369616c5f6f776e6572180f2001280b32242e76656c6d69652e77616c6c65742e75736572732e42656e6966696369616c4f776e657212320a0a757365725f67726f757018102001280b321e2e76656c6d69652e77616c6c65742e75736572732e5573657247726f757012350a0f636f6d70616e795f64657461696c7318112001280b321c2e76656c6d69652e77616c6c65742e75736572732e436f6d70616e7922df020a0b5573657244657461696c7312100a08636c6173735f696418012001280912210a19636f756e7472795f6f665f7265736964656e63655f69736f3218022001280912230a1b636f756e7472795f6f665f636974697a656e736869705f69736f32180320012809121a0a12646174655f6f665f62697274685f79656172180420012804121b0a13646174655f6f665f62697274685f6d6f6e746818052001280412190a11646174655f6f665f62697274685f64617918062001280412150a0d646f63756d656e745f74797065180720012809121c0a14646f63756d656e745f706572736f6e616c5f6964180820012809120b0a0366617818092001280912190a11686f6d655f70686f6e655f6e756d626572180a2001280912160a0e696e7465726e616c5f6e6f746573180b20012809121b0a136f66666963655f70686f6e655f6e756d626572180c2001280912100a08706f736974696f6e180d2001280922a5010a0e506879736963616c416472657373121a0a1270615f7a69705f706f7374616c5f636f646518012001280912120a0a70615f61646472657373180220012809121b0a1370615f616464726573735f326e645f6c696e65180320012809120f0a0770615f6369747918042001280912170a0f70615f636f756e7472795f69736f32180520012809121c0a1470615f73746174655f70726f765f726567696f6e1806200128092285020a0f42656e6966696369616c4f776e657212140a0c626f5f66756c6c5f6e616d6518012001280912170a0f626f5f70686f6e655f6e756d626572180220012809121d0a15626f5f646174655f6f665f62697274685f79656172180320012804121e0a16626f5f646174655f6f665f62697274685f6d6f6e7468180420012804121c0a14626f5f646174655f6f665f62697274685f646179180520012804121f0a17626f5f646f63756d656e745f706572736f6e616c5f696418062001280912180a10626f5f646f63756d656e745f7479706518072001280912120a0a626f5f6164647265737318082001280912170a0f626f5f72656c6174696f6e73686970180920012809223a0a095573657247726f7570120a0a026964180120012804120c0a046e616d6518022001280912130a0b6465736372697074696f6e18032001280922a3010a07436f6d70616e79120a0a02494418022001280412140a0c636f6d70616e795f6e616d6518032001280912140a0c636f6d70616e795f7479706518042001280912140a0c636f6d70616e795f726f6c65180520012809121b0a136469726563746f725f66697273745f6e616d65180620012809121a0a126469726563746f725f6c6173745f6e616d6518072001280912110a096d61736b5f6e616d65180820012809226f0a11436f6d70616e696573526573706f6e7365122f0a09436f6d70616e69657318012003280b321c2e76656c6d69652e77616c6c65742e75736572732e436f6d70616e7912290a056572726f7218022001280b321a2e76656c6d69652e77616c6c65742e75736572732e4572726f7222220a13436f6d70616e69657349447352657175657374120b0a0349447318012003280422250a14436f6d70616e6965734e616d6552657175657374120d0a056e616d657318012003280932900a0a0b5573657248616e646c657212470a084765744279554944121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e7365124c0a0d4765744279557365726e616d65121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e7365124f0a10476574427950726f66696c6544617461121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e7365124c0a0d4765744279526f6c654e616d65121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512520a1356616c6964617465416363657373546f6b656e121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512480a09476574427955494473121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e7365124f0a1047657442795573657247726f75704964121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512450a06476574416c6c121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512690a1247657446756c6c5573657273427955494473122b2e76656c6d69652e77616c6c65742e75736572732e5265717565737446756c6c55736572734279554944731a262e76656c6d69652e77616c6c65742e75736572732e46756c6c5573657273526573706f6e7365125c0a0f47657444657669636573427955494412232e76656c6d69652e77616c6c65742e75736572732e44657669636573526571756573741a242e76656c6d69652e77616c6c65742e75736572732e44657669636573526573706f6e736512580a19476574427941646d696e6973747261746f72436c6173734964121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512530a1456616c6964617465546d7041757468546f6b656e121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e7365124c0a0d47657453746166665573657273121c2e76656c6d69652e77616c6c65742e75736572732e526571756573741a1d2e76656c6d69652e77616c6c65742e75736572732e526573706f6e736512650a11476574436f6d70616e696573427949447312282e76656c6d69652e77616c6c65742e75736572732e436f6d70616e696573494473526571756573741a262e76656c6d69652e77616c6c65742e75736572732e436f6d70616e696573526573706f6e736512680a1353617665436f6d70616e69657342794e616d6512292e76656c6d69652e77616c6c65742e75736572732e436f6d70616e6965734e616d65526571756573741a262e76656c6d69652e77616c6c65742e75736572732e436f6d70616e696573526573706f6e736542075a057573657273620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
